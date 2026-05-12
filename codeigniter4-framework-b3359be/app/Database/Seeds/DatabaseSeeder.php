<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        public function run()
    {
        $this->call('UserSeeder');
        $this->call('RessourceSeeder');
        $this->call('CreneauSeeder');
        $this->call('ReservationSeeder');
    }
}
