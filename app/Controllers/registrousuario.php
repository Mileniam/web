<?php

namespace App\controllers;

use App\Models\UsuariosModel;

class RegistroUsuario extends BaseController
{
    public function index()
    {
        return view('registro de usuario');
    }

    public function guardar()
    {
        //Verificar datos del registro

        $rules = [
            'username' => 'required|max_length[20]|is_unique[usuarios.usuario_nombre]',
            'password' => 'required|max_length[16]|min_length[8]',
            'password2' => 'matches[password]',
            'Email' => 'required|max_length[100]|valid_email|is_unique[usuarios.correo]'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
        
        //Insertar datos en la base de datos

        $UsuariosModel = new UsuariosModel();
        $post = $this->request->getPost(['username', 'password', 'Email']);
       
        $UsuariosModel->insert([
            'usuario_nombre'=> $post['username'],
            'contrasena'=> password_hash($post['password'], PASSWORD_DEFAULT),
            'correo'=> $post['Email'],
            'imagen_perfil' => 'usuario.jpg'
        ]);

        return view('Inicio de sesion');

    }

}