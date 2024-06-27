<?php

namespace App\controllers;

use App\Models\UsuariosModel;

class InicioSesion extends BaseController
{
    public function index()
    {
        return view('Inicio de sesion');
    }

    public function autenticar()
    {
        // Verificar que no hayan campos vacios

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        // Validar datos del login

        $UsuariosModel = new UsuariosModel();
        $post = $this->request->getPost(['username', 'password']);

        $user = $UsuariosModel->validateUser($post['username'], $post['password']);

        if($user !== null){
            $this->setSession($user);
            return redirect()->to('escritorio');
        }

        return redirect()->back()->withInput()->with('errors', 'El usuario y/o contraseña son incorrectos.');

    }

    // Sesión de usuario
    
    private function setSession($userData){
        $data = [
            'logged_in' => true,
            'userid' => $userData['usuario_id'],
            'username' => $userData['usuario_nombre'],
            'Email' => $userData['correo'],
            'ImgPerfil' => $userData['imagen_perfil']
        ];

        $this->session->set($data);
    }

}