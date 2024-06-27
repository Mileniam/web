<?php

namespace App\Models;

use CodeIgniter\Model;

class Listas_tareasModel extends Model
{
    protected $table            = 'listas_tareas';
    protected $primaryKey       = 'lista_id';
    protected $useAutoIncrement = true;
    protected $returnType        = 'array';
    protected $userofDeletes    = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['proyecto_id', 'nombre'];

    protected bool $allowEmptyInserts = false;
}