<?php

namespace App\Models;

use App\Models\ProyectosModel;

use CodeIgniter\Model;

class PerfilesModel extends Model
{
    protected $table            = 'perfiles';
    protected $primaryKey       = 'perfil_id';
    protected $useAutoIncrement = true;
    protected $returnType        = 'array';
    protected $userofDeletes    = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['usuario_id', 'nombre_completo', 'tipo_neurodivergencia_id', 'rol'];
    protected $afterInsert      = ['storeUserProyecto'];

    protected bool $allowEmptyInserts = false;

    protected function storeUserProyecto($data){
        $data['id'];

        $ProyectosModel = new ProyectosModel();
        $ProyectosModel->insert([
            'perfil_id'=> $data['id'],
            
        ]);

    }
    
    
}
