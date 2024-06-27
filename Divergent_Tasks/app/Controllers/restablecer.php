<?php

namespace App\controllers;

use App\Models\UsuariosModel;

class Restablecer extends BaseController
{
    public function index()
    {
        return view('Restablecer');
    }

    public function resetForm($token){

        // Validar Token

        $UsuariosModel = new UsuariosModel();
        $user = $UsuariosModel->where(['reset_token' => $token])->first();

        if($user){
            $currentDateTime = new \DateTime ();
            $currentDateTimeStr = $currentDateTime->format('Y-m-d H:i:s');

            if($currentDateTimeStr <= $user['reset_token_expires']){
                return view('Restablecer', ['token' => $token]);
            } 
            else{
                return $this->showMessage('El enlace ha expirado', 'Por favor, solicita un nuevo enlace para reestablecer tu contraseña.');
            }
        }
        return $this->showMessage('Ocurrió un error', 'Por favor intente de nuevo más tarde.');
    }

    // Cambiar la contraseña

    public function resetPassword(){
        $rules = [
            'password' => 'required|max_length[16]|min_length[8]',
            'password2' => 'matches[password]'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $UsuariosModel = new UsuariosModel();
        $post = $this->request->getPost(['token', 'password']);

        $user = $UsuariosModel->where(['reset_token' => $post['token']])->first();

        if($user){
            $UsuariosModel->update($user['usuario_id'], [
                'contrasena' => password_hash($post['password'], PASSWORD_DEFAULT),
                'reset_token' => '',
                'reset_token_expires' => ''
            
            ]);

            return $this->showMessage('Contraseña modificada', 'Hemos modificado la contraseña.');
        }
        return $this->showMessage('Ocurrió un error', 'Por favor intente de nuevo más tarde.');
    }

    private function showMessage($title, $message){
        $data = [
            'title' => $title,
            'message' => $message
        
        ];

        return view('message', $data);

    }

}