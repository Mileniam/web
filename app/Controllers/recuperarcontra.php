<?php

namespace App\controllers;

use App\Models\UsuariosModel;

class RecuperarContra extends BaseController
{
    public function index()
    {
        return view('Recuperarcontraseña');
    }

    public function sendResetLinkEmail(){

        // Verificar si el correo es valido
        $rules = [
            'Email' => 'required|required|max_length[100]|valid_email|'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        // Validar correo

        $UsuariosModel = new UsuariosModel();
        $post = $this->request->getPost(['Email']);
        $user = $UsuariosModel->where(['correo' => $post['Email']])->first();

        // Crear Token de recuperación

        if($user == null){

            return $this->showMessage('Correo inválido', 'El correo proporcionado no está vinculado a ninguna cuenta.');

        }else{
            $token = bin2hex(random_bytes(20));

            $expiresAt = new \DateTime();
            $expiresAt->modify('+1 hour');

            $UsuariosModel->update($user['usuario_id'], ['reset_token' =>$token, 'reset_token_expires' => $expiresAt->format('Y-m-d H:i:s'),]);

            // Activar servicio de correos y enviar Token de recuperación

            $email = \Config\Services::email();
            $email->setTo($post['Email']);
            $email->setSubject('Recuperar contraseña');

            $url = base_url('restablecer/'. $token);
            $body = '<p>Hola '.$user['usuario_nombre'] . '</p>';
            $body .= "<p>Se ha solicitado un reinicio de contraseña.<br>Para restaurar la contraseña visita la siguiente dirección: <a href='$url'>$url</a></p>";
        
            $email->setMessage($body);
            $email->send();
        }

        $title = 'Correo de recuperación enviado';
        $message = 'Se ha enviado un correo electrónico para restablecer tu contraseña';

        return $this->showMessage($title, $message);


    }

    // Función de mensaje

    private function showMessage($title, $message){
        $data = [
            'title' => $title,
            'message' => $message
        
        ];

        return view('message', $data);

    }


}