<?php
$this->forge->addField([
    'id'         => ['type' => 'INTEGER', 'auto_increment' => true],
    'nom'        => ['type' => 'VARCHAR', 'constraint' => 100],
    'email'      => ['type' => 'VARCHAR', 'constraint' => 150],
    'password'   => ['type' => 'VARCHAR', 'constraint' => 255],
    'role'       => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'client'],
    'created_at' => ['type' => 'DATETIME', 'null' => true],
]);
$this->forge->addKey('id', true);
$this->forge->createTable('users');