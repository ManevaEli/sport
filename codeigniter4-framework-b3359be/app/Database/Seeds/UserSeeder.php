<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // donnees test
        $data = [
            [
                'nom'      => 'Admin_FitSpace',
                'email'    => 'admin@fitspace.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
            ],
            [
                'nom'      => 'Jean_Client',
                'email'    => 'jean@exemple.com',
                'password' => password_hash('client123', PASSWORD_DEFAULT),
                'role'     => 'client',
            ],
        ];
    
        // On insère tout le groupe d'un coup
        $this->db->table('users')->insertBatch($data);
    }
}
