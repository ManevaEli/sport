<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RessourceSeeder extends Seeder
{
    public function run()
    {
        //donnee test
        $data = [
            [
                'nom' => 'Salle de yoga',
                'description' => 'Salle équipée pour les cours de yoga',
                'type' => 'salle',
                'capacite' => 20
            ],
            [
                'nom' => 'Salle de fitness', 
                'type' => 'salle',
                'description' => 'Salle avec équipements de musculation', 
                'capacite' => 30
            ],
            [
                'nom' => 'Piscine', 
                'type' => 'salle',
                'description' => 'Piscine olympique 25m', 
                'capacite' => 50
            ],
            [
                'nom' => 'Court de squash', 
                'type' => 'salle',
                'description' => 'Court de squash climatisé', 
                'capacite' => 2
            ],
            [
                'nom' => 'Salle de spinning',
                'type' => 'salle',
                'description' => 'Salle avec vélos de spinning', 
                'capacite' => 25
            ],
        ];
        $this->db->table('ressources')->insertBatch($data);

    }
}
