<?php
$this->forge->addField([
    'id'          => ['type' => 'INTEGER', 'auto_increment' => true],
    'ressource_id' => ['type' => 'INTEGER'],
    'date_debut'         => ['type' => 'DATETIME'],
    'date_fin'    => ['type' => 'DATETIME'],
    'places-disponible' => ['type' => 'INTEGER'],
    'actif' => ['type' => 'BOOLEAN', 'default' => 1],
]);
$this->forge->addKey('id', true);
$this->forge->addForeignKey('ressource_id', 'ressources', 'id', 'CASCADE', 'CASCADE');
$this->forge->createTable('creneaux');