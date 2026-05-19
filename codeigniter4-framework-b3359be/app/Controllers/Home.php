<?php

namespace App\Controllers;

use App\Models\CreneauModel;
use App\Models\User;
use App\Models\ReservationModel;

class Home extends BaseController
{
public function index()
    {
        return view('public/index');
    }

    public function creneaux()
    {
        $creneauModel = new CreneauModel();
        $creneauxRaw = $creneauModel->getCreneauxDisponibles();
        
        $creneauxFormatte = [];
        $dateFormatter = new \IntlDateFormatter('fr_FR', \IntlDateFormatter::NONE, \IntlDateFormatter::NONE, null, null, 'E d LLLL');
        
        foreach ($creneauxRaw as $c) {
            $dateDebut = new \DateTime($c['date_debut']);
            $dateFin = new \DateTime($c['date_fin']);
            
            $placesPrises = $c['ressource_capacite'] - $c['places_disponible'];
            $pourcentageRemplissage = ($c['ressource_capacite'] > 0) ? ($placesPrises / $c['ressource_capacite']) * 100 : 0;

            $creneauxFormatte[] = [
                'id'                 => $c['id'],
                'titre'              => $c['ressource_nom'],
                'type'               => strtolower($c['ressource_type']), 
                'description'        => $c['ressource_desc'],
                'date_jour'          => ucfirst($dateFormatter->format($dateDebut)),
                'heure_debut'        => $dateDebut->format('H\hi'), 
                'heure_fin'          => $dateFin->format('H\hi'),  
                'places_restantes'   => $c['places_disponible'],
                'capacite_totale'    => $c['ressource_capacite'],
                'jauge_pourcentage'  => $pourcentageRemplissage,
                'est_complet'        => ($c['places_disponible'] <= 0)
            ];
        }

        return view('client/creneaux', [
            'creneaux' => $creneauxFormatte,
            'total'    => count($creneauxFormatte)
        ]);
    }

    public function login()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('mdp');

        $userModel = new User();
        
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            
            session()->set([
                'user_id'    => $user['id'],
                'user_nom'   => $user['nom'],
                'user_role'  => $user['role'],
                'isLoggedIn' => true
            ]);

            return $this->response->setJSON([
                'success'  => true,
                'redirect' => base_url('/client') 
            ]);
        }
        

        // Si ça échoue
        return $this->response->setStatusCode(401)->setJSON([
            'success' => false,
            'message' => 'Identifiants incorrects.'
        ]);
    }

    public function log()
    {
        return view('auth/login');
    }

       public function insc()
    {
        return view('auth/register');
    }

          public function client()
    {
        return view('client/dashboard');
    }

    public function inscription()
    {
        $nom      = $this->request->getPost('nom');
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('mdp');

        // Validation basique
        if (empty($nom) || empty($email) || empty($password)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Tous les champs sont obligatoires.'
            ]);
        }

        $userModel = new User();

        if ($userModel->where('email', $email)->first()) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Cet email est déjà utilisé.'
            ]);
        }

        $userData = [
            'nom'      => $nom,
            'email'    => $email,
            'password' => $password,
            'role'     => 'client' // Rôle par défaut sécurisé
        ];

        if ($userModel->insert($userData)) {
            return $this->response->setJSON([
                'success'  => true,
                'message'  => 'Inscription réussie ! Vous pouvez vous connecter.',
                'redirect' => base_url('/')
            ]);
        }

        return $this->response->setStatusCode(500)->setJSON([
            'success' => false,
            'message' => 'Une erreur est survenue lors de l\'inscription.'
        ]);
    }

public function reserver($id)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to(base_url('/log'))->with('error', 'Vous devez être connecté pour réserver.');
    }

    $userId = session()->get('user_id');
    $creneauModel = new CreneauModel();
    $reservationModel = new ReservationModel();

    $creneau = $creneauModel->find($id);
    if (!$creneau || $creneau['places_disponible'] <= 0) {
        return redirect()->to(base_url('/creneaux'))->with('error', 'Créneau indisponible ou complet.');
    }

    $dejaReserve = $reservationModel->where('user_id', $userId)->where('creneau_id', $id)->first();
    if ($dejaReserve) {
        return redirect()->to(base_url('/creneaux'))->with('error', 'Vous avez déjà réservé ce créneau !');
    }

    $db = \Config\Database::connect();
    $db->transStart();

    $reservationModel->insert([
        'user_id'    => $userId,
        'creneau_id' => $id,
        'status'     => 'en attente',
        'created_at' => date('Y-m-d H:i:s')
    ]);

    $creneauModel->update($id, [
        'places_disponible' => $creneau['places_disponible'] - 1
    ]);

    $db->transComplete();

    if ($db->transStatus() === false) {
        return redirect()->to(base_url('/creneaux'))->with('error', 'Erreur lors de la réservation.');
    }

    return redirect()->to(base_url('/creneaux'))->with('success', 'Réservation enregistrée avec succès !');
}

public function mesReservations()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/log'))->with('error', 'Veuillez vous connecter.');
        }

        $userId = session()->get('user_id');
        $reservationModel = new ReservationModel();
        $reservationsRaw = $reservationModel->getReservationsByUserId($userId);

        $reservationsFormattees = [];
        $dateFormatter = new \IntlDateFormatter('fr_FR', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE, null, null, 'd MMMM yyyy');

        foreach ($reservationsRaw as $res) {
            $dateDebut = new \DateTime($res['date_debut']);
            $dateFin   = new \DateTime($res['date_fin']);

            $reservationsFormattees[] = [
                'id'      => $res['reservation_id'],
                'nom'     => $res['ressource_nom'],
                'type'    => strtolower($res['ressource_type']),
                'date'    => $dateFormatter->format($dateDebut),
                'horaire' => $dateDebut->format('H\hi') . ' – ' . $dateFin->format('H\hi'),
                'status'  => $res['status']
            ];
        }

        return view('client/reservations', [
            'reservations' => $reservationsFormattees
        ]);
    }

    public function annulerReservation($id)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to(base_url('/log'))->with('error', 'Veuillez vous connecter.');
    }

    $userId = session()->get('user_id');
    $reservationModel = new ReservationModel();
    $creneauModel = new CreneauModel();

    $reservation = $reservationModel->where('id', $id)->where('user_id', $userId)->first();

    if (!$reservation) {
        return redirect()->to(base_url('/reservations'))->with('error', 'Réservation introuvable ou action non autorisée.');
    }

    if ($reservation['status'] === 'annulee' || $reservation['status'] === 'annulé') {
        return redirect()->to(base_url('/reservations'))->with('error', 'Cette réservation est déjà annulée.');
    }

    $db = \Config\Database::connect();
    $db->transStart();

    $reservationModel->update($id, ['status' => 'annulé']);
    
    //$reservationModel->delete($id);

    $creneau = $creneauModel->find($reservation['creneau_id']);
    if ($creneau) {
        $creneauModel->update($reservation['creneau_id'], [
            'places_disponible' => $creneau['places_disponible'] + 1
        ]);
    }

    $db->transComplete();

    if ($db->transStatus() === false) {
        return redirect()->to(base_url('/reservations'))->with('error', 'Une erreur est survenue lors de l\'annulation.');
    }

    return redirect()->to(base_url('/reservations'))->with('success', 'Votre réservation a bien été annulée. Une place a été libérée !');
}
}