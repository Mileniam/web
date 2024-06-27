<?php

namespace App\Models;

use App\Models\PerfilesModel;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'usuario_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $userofDeletes    = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['usuario_nombre', 'correo', 'contrasena', 'reset_token', 'reset_token_expires', 'imagen_perfil'];
    protected $afterInsert      = ['storeUserInfo'];

    protected bool $allowEmptyInserts = false;

    // Fechas
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField   = 'fecha_creacion';
    protected $updatedField   = '';  

    public function validateUser($user, $password){
        $user = $this->where(['usuario_nombre' => $user])->first();
        if($user && password_verify($password, $user['contrasena'])){
            return $user;
        }
        return null;
    }

    // Crear datos del usuario en la tabla de perfil

    protected function storeUserInfo($data){
        $data['id'];

        $PerfilesModel = new PerfilesModel();
        $PerfilesModel->insert([
            'usuario_id'=> $data['id'],
            'nombre_completo'=> 'nombre',
            'rol'=> '2'
            
        ]);

    }

}
