<?php
$this->forge->addField([
    'id'           => ['type' => 'INTEGER', 'auto_increment' => true],
    'user-id' => ['type' => 'INTEGER'],
    'creneau_id' => ['type' => 'INTEGER'],
    'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
    'created_at'   => ['type' => 'DATETIME', 'null' => true],
]);
$this->forge->addKey('id', true);
$this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
$this->forge->addForeignKey('creneau_id', 'creneaux', 'id', 'CASCADE', 'CASCADE');
$this->forge->createTable('reservations');