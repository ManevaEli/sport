<?php

namespace App\Models;

use CodeIgniter\Model;

class CreneauModel extends Model
{
    protected $table            = 'creneaux';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['ressource_id', 'date_debut', 'date_fin', 'places_disponible', 'actif'];


    public function getCreneauxDisponibles()
    {
        return $this->select('creneaux.*, ressources.nom as ressource_nom, ressources.type as ressource_type, ressources.capacite as ressource_capacite, ressources.description as ressource_desc')
                    ->join('ressources', 'ressources.id = creneaux.ressource_id')
                    ->where('creneaux.actif', 1)
                    ->orderBy('creneaux.date_debut', 'ASC')
                    ->findAll();
    }
    public function getAllCreneaux()
{
    return $this->select('creneaux.*, ressources.nom as ressource_nom, ressources.type as ressource_type, ressources.description as ressource_desc, ressources.capacite as ressource_capacite')
                ->join('ressources', 'ressources.id = creneaux.ressource_id')
                // ->where('creneaux.actif', 1) <-- On commente ou on supprime cette ligne !
                ->orderBy('creneaux.date_debut', 'ASC')
                ->findAll();
}
}