<?php
$this->forge->addField([
    'id'         => ['type' => 'INTEGER', 'auto_increment' => true],
    'nom'        => ['type' => 'VARCHAR', 'constraint' => 100],
    'type'       => ['type' => 'VARCHAR', 'constraint' => 50],
    'capacite'   => ['type' => 'INTEGER'],
    'description' => ['type' => 'TEXT'],
    'created_at' => ['type' => 'DATETIME', 'null' => true],
]);
$this->forge->addKey('id', true);
$this->forge->createTable('ressources');