<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table            = 'events';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['title', 'start_datetime', 'end_datetime', 'description'];
}