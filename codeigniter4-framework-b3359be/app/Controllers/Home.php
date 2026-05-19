<?php

namespace App\Controllers;

use App\Models\CreneauModel;
use App\Models\User;

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

<<<<<<< Updated upstream
          public function client()
    {
        return view('client/dashboard');
    }

=======
    public function creneau_admin()
    {
        return view('admin/creneaux');
    }
    public function dashboard_admin(){
        return view('admin/dashboard');
    }
    public function edit_creneau()
    {
        return view('admin/edit_creneau');
    }
    public function reservations_admin()
    {
        return view('admin/reservations');
    }
    
>>>>>>> Stashed changes
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
}