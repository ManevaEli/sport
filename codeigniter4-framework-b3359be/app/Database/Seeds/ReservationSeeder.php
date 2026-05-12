<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        //donnee test
        $reservationsData = [
            ['user_id' => 1, 'creneaux_id' => 1, 'reservation_date' => '2026-05-15', 'status' => 'confirmée'],
            ['user_id' => 2, 'creneaux_id' => 2, 'reservation_date' => '2026-05-15', 'status' => 'confirmée'],
            ['user_id' => 3, 'creneaux_id' => 3, 'reservation_date' => '2026-05-20', 'status' => 'en attente'],
            ['user_id' => 1, 'creneaux_id' => 5, 'reservation_date' => '2026-05-18', 'status' => 'confirmée'],
            ['user_id' => 4, 'creneaux_id' => 7, 'reservation_date' => '2026-05-22', 'status' => 'confirmée'],
        ];
        $this->db->table('reservations')->insertBatch($reservationsData);
    }
}
