<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'nom'        => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => false],
            'password'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'role'       => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'client'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}