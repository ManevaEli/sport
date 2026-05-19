<?php

namespace App\Controllers;

use App\Models\EventModel;

class Calendar extends BaseController
{
    public function index()
    {
        // Charge la page de l'emploi du temps
        return view('calendar_view');
    }

    // Cette fonction renvoie les données au calendrier
    public function loadEvents()
    {
        $eventModel = new EventModel();
        
        // FullCalendar envoie automatiquement des paramètres 'start' et 'end' en GET lors de la navigation
        $start = $this->request->getGet('start');
        $end = $this->request->getGet('end');

        // On filtre l'emploi du temps pour la période affichée à l'écran
        $events = $eventModel->where('start_datetime >=', $start)
                             ->where('end_datetime <=', $end)
                             ->findAll();

        $data = [];
        foreach ($events as $row) {
            $data[] = [
                'id'    => $row['id'],
                'title' => $row['title'],
                'start' => $row['start_datetime'],
                'end'   => $row['end_datetime'],
                // Vous pouvez ajouter d'autres propriétés comme 'color' ou 'description'
            ];
        }

        return $this->response->setJSON($data);
    }
}