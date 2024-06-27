<?php

namespace App\Models;

use CodeIgniter\Model;

class TareasModel extends Model
{
    protected $table            = 'tareas';
    protected $primaryKey       = 'tarea_id';
    protected $useAutoIncrement = true;
    protected $returnType        = 'array';
    protected $userofDeletes    = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['lista_id', 'titulo', 'descripcion'];

    protected bool $allowEmptyInserts = false;
    
    // Fechas
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField   = 'fecha_creacion';
    protected $updatedField   = 'fecha_vencimiento';  
}