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
                'name' => 'Salle de yoga',
                'description' => 'Salle équipée pour les cours de yoga',
                'capacity' => 20
            ],
            [
                'name' => 'Salle de fitness', 
                'description' => 'Salle avec équipements de musculation', 
                'capacity' => 30
            ],
            [
                'name' => 'Piscine', 
                'description' => 'Piscine olympique 25m', 
                'capacity' => 50
            ],
            [
                'name' => 'Court de squash', 
                'description' => 'Court de squash climatisé', 
                'capacity' => 2
            ],
            [
                'name' => 'Salle de spinning', 
                'description' => 'Salle avec vélos de spinning', 
                'capacity' => 25
            ],
        ];
        $this->db->table('ressources')->insertBatch($data);

    }
}
