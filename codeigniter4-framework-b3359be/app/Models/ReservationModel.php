<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table            = 'reservations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['user_id', 'creneau_id', 'status', 'created_at'];
    protected $useTimestamps    = false;

    public function getReservationsByUserId(int $userId): array
    {
        return $this->select('
                        reservations.id as reservation_id, 
                        reservations.status, 
                        reservations.created_at, 
                        creneaux.date_debut, 
                        creneaux.date_fin, 
                        ressources.nom as ressource_nom, 
                        ressources.type as ressource_type
                    ')
                    ->join('creneaux', 'creneaux.id = reservations.creneau_id')
                    ->join('ressources', 'ressources.id = creneaux.ressource_id') 
                    ->where('reservations.user_id', $userId)
                    ->orderBy('reservations.created_at', 'DESC')
                    ->findAll();
    }
}