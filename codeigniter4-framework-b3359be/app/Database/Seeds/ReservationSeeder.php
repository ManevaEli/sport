<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        //donnee test
        $reservationsData = [
            [
                'user_id' => 1,
                'creneau_id' => 1, 
                'status' => 'confirmée'
            ],
            [
                'user_id' => 2, 
                'creneau_id' => 2,  
                'status' => 'confirmée'
            ],
            [
                'user_id' => 3, 
                'creneau_id' => 3, 
                'status' => 'en attente'
            ],
            [
                'user_id' => 1, 
                'creneau_id' => 5, 
                'status' => 'confirmée'
            ],
            [
                'user_id' => 4, 
                'creneau_id' => 7, 
                'status' => 'confirmée'
            ],
        ];
        $this->db->table('reservations')->insertBatch($reservationsData);
    }
}
