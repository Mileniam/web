<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyectosModel extends Model
{
    protected $table            = 'proyectos';
    protected $primaryKey       = 'proyecto_id';
    protected $useAutoIncrement = true;
    protected $returnType        = 'array';
    protected $userofDeletes    = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['perfil_id', 'titulo', 'descripción'];

    protected bool $allowEmptyInserts = false; 

    // Fechas
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField   = 'fecha_creacion';
    protected $updatedField   = '';  
}