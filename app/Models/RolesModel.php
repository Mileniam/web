<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table            = 'roles';
    protected $primaryKey       = 'rol_id';
    protected $useAutoIncrement = true;
    protected $returnType        = 'array';
    protected $userofDeletes    = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['funcion'];

    protected bool $allowEmptyInserts = false; 
}