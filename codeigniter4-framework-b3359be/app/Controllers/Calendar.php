<?php

namespace App\Controllers;

use App\Models\CreneauModel;
use App\Models\ReservationModel;

class Calendar extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/log'))->with('error', 'Veuillez vous connecter.');
        }

        return view('client/calendar');
    }

   public function loadEvents()
{
    if (!session()->get('isLoggedIn')) {
        return $this->response->setStatusCode(401)->setJSON(['error' => 'Non autorisé']);
    }

    $userId = session()->get('user_id');
    
    $creneauModel = new CreneauModel();
    $reservationModel = new ReservationModel();

    // CORRECTIF JOINTURE : On récupère les créneaux ET le nom de leur ressource associée
    $creneaux = $creneauModel->select('creneaux.*, ressources.nom as ressource_nom')
                             ->join('ressources', 'ressources.id = creneaux.ressource_id')
                             ->findAll(); 

    // Récupérer les réservations de l'utilisateur
    $mesReservationsRaw = $reservationModel->getReservationsByUserId($userId);
    
    // Extraire les IDs de créneaux réservés
    $creneauxReservesIds = array_column($mesReservationsRaw, 'creneau_id');

    $events = [];

    // Ajouter les créneaux au calendrier
    foreach ($creneaux as $c) {
        if (in_array($c['id'], $creneauxReservesIds)) {
            continue;
        }

        $estComplet = ($c['places_disponible'] <= 0);
        // Utilisation d'une valeur par défaut sécurisée au cas où le nom de la ressource est vide
        $nomRessource = $c['ressource_nom'] ?? 'Activité';

        $events[] = [
            'id'              => 'creneau_' . $c['id'],
            'title'           => esc($nomRessource) . ($estComplet ? ' (Complet)' : ' (' . $c['places_disponible'] . ' pl.)'),
            'start'           => $c['date_debut'],
            'end'             => $c['date_fin'],
            'backgroundColor' => $estComplet ? '#6c757d' : '#3788d8',
            'borderColor'     => $estComplet ? '#6c757d' : '#3788d8',
            'url'             => $estComplet ? '' : base_url('/reserver/' . $c['id']),
            'extendedProps'   => [
                'type' => 'dispo'
            ]
        ];
    }

    // Ajouter les réservations actives du client
    foreach ($mesReservationsRaw as $res) {
        if ($res['status'] === 'annulé' || $res['status'] === 'annulee') {
            continue; 
        }

        $nomRessourceRes = $res['ressource_nom'] ?? 'Ma Réservation';

        $events[] = [
            'id'              => 'res_' . ($res['reservation_id'] ?? $res['id']),
            'title'           => '✓ ' . esc($nomRessourceRes),
            'start'           => $res['date_debut'],
            'end'             => $res['date_fin'],
            'backgroundColor' => '#28a745',
            'borderColor'     => '#28a745',
            'url'             => base_url('/reservations'),
            'extendedProps'   => [
                'type' => 'reserve'
            ]
        ];
    }

    return $this->response->setJSON($events);
}

    
}