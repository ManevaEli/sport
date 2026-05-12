<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CrenneauSeeder extends Seeder
{
    public function run()
    {
        //donnee test
        // Insertion des créneaux
        $creneauxData = [
            [
                'resource_id' => 1, 
                'start_time' => '08:00:00', 
                'end_time' => '09:00:00', 
                'day_of_week' => 'lundi'
            ],
            [
                'resource_id' => 1, 
                'end_time' => '10:30:00', 
                'start_time' => '09:30:00', 
                'day_of_week' => 'lundi'
            ],
            [
                'resource_id' => 1, 
                'start_time' => '18:00:00', 
                'end_time' => '19:00:00', 
                'day_of_week' => 'mercredi'
            ],
            [
                'resource_id' => 2, 
                'start_time' => '07:00:00', 
                'end_time' => '22:00:00', 
                'day_of_week' => 'lundi'
            ],
            [
                'resource_id' => 3, 
                'start_time' => '09:00:00', 
                'end_time' => '12:00:00', 
                'day_of_week' => 'mardi'
            ],
            [
                'resource_id' => 3, 
                'start_time' => '14:00:00', 
                'end_time' => '18:00:00', 
                'day_of_week' => 'jeudi'
            ],
            [
                'resource_id' => 4, 
                'start_time' => '10:00:00', 
                'end_time' => '11:00:00', 
                'day_of_week' => 'samedi'
            ],
            [
                'resource_id' => 5, 
                'start_time' => '17:30:00', 
                'end_time' => '18:30:00', 
                'day_of_week' => 'lundi'
            ],
        ];
        $this->db->table('creneaux')->insertBatch($creneauxData);

    }
}
