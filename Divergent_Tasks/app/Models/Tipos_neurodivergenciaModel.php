<?php

namespace App\Models;

use CodeIgniter\Model;

class Tipos_neurodivergenciaModel extends Model
{
    protected $table            = 'tipos_neurodivergencia';
    protected $primaryKey       = 'tipos_neurodivergencia_id';
    protected $useAutoIncrement = true;
    protected $returnType        = 'array';
    protected $userofDeletes    = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre'];

    protected bool $allowEmptyInserts = false; 
}