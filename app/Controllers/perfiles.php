<?php

namespace App\controllers;

use App\Models\PerfilesModel;
use App\Models\UsuariosModel;
use SessionUpdateTimestampHandlerInterface;

class Perfiles extends BaseController
{
    public function index()
    {
        return view('perfiles');
    }

    // Cambiar la contraseña

    public function resetPassword(){
        $rules = [
            'password' => 'required', 
            'newpassword' => 'required|max_length[16]|min_length[8]',
            'newpassword2' => 'matches[newpassword]'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        // Cambio de contraseña

        $UsuariosModel = new UsuariosModel();
        $post = $this->request->getPost(['password', 'newpassword']);

        $user = $UsuariosModel->where(['usuario_id' => $_SESSION['userid']])->first();

        if($user !== null){
       
            $UsuariosModel->update($user['usuario_id'], [
                'contrasena' => password_hash($post['newpassword'], PASSWORD_DEFAULT)
            ]);

            $PerfilesModel = new PerfilesModel();
            $post2 = $this->request->getPost(['nombre']);

            $perfil = $PerfilesModel->where(['usuario_id' => $_SESSION['userid']])->first();

            if($perfil !== null){

                $PerfilesModel->update($perfil['perfil_id'], [
                    'nombre_completo' => $post2['nombre']
                ]);
                return redirect()->back();
            }
            return redirect()->back()->withInput()->with('errors', 'No se pudo actualizar el nombre');


            
        }
        return redirect()->back()->withInput()->with('errors', 'No se pudo actualizar la contraseña');
        

    }

    public function SubirImagen(){

        $file = $this->request->getFile('file');

        if(!$file->isValid()){
            echo $file->getErrorString();
            exit;
        }

        //Validar archivo subido

        $reglas= [
            'file' => [
                'label' => 'file',
                'rules' => [
                    'is_image[file]',
                    'max_size[file,800]',
                    'max_dims[file,1024,768]'
                ]
            ]
        ];

        if(!$this->validate($reglas)){
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
        //Subir archivo

        if(!$file->hasMoved()){

            $ImageName = $file->getRandomName();
            $ruta = ROOTPATH . 'public/img/perfil';
            $file->move($ruta, $ImageName);

            
        }

        //Guardar nombre en base de datos y actualizar dato de sesion
        $UsuariosModel = new UsuariosModel();

        $user = $UsuariosModel->where(['usuario_id' => $_SESSION['userid']])->first();

        if($user !== null){
       
            $UsuariosModel->update($user['usuario_id'], [
                'imagen_perfil' => $ImageName
            ]);

            $_SESSION['ImgPerfil'] = $ImageName;
            return redirect()->back(); 

            
        }
        return redirect()->back()->withInput()->with('errors', 'No se pudo actualizar la contraseña');
    }

}