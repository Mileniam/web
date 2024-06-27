<?php

namespace App\controllers;

use App\Models\PerfilesModel;
use App\Models\ProyectosModel;

class Escritorio extends BaseController
{
    public function index()
    {
        if($this->session->get('logged_in')){
            return view('escritorio');
        }
        
        return $this->showMessage('Ocurrió un error', 'Por favor intente de nuevo más tarde.');
    }
    

    public function logout()
    {
        if($this->session->get('logged_in')){
            $this->session->destroy();
        }

        return redirect()->to(base_url('/iniciosesion'));
    }

    public function GuardarTarea(){

        $rules = [
            'todo-input' => 'required'
        ];

        $PerfilesModel = new PerfilesModel();
        $perfil = $PerfilesModel->where(['usuario_id' => $_SESSION['userid']])->first();

        if($this->validate($rules)){
            
            $ProyectosModel = new ProyectosModel();
            $post = $this->request->getPost(['todo-input']);

            $proyecto = $ProyectosModel->where(['perfil_id' => $perfil['perfil_id']])->first();

            if($proyecto !== null){

                $ProyectosModel->insert([
                    'perfil_id'=> $perfil['perfil_id'],
                    'titulo'=> $post['todo-input'],
                    
                ]);
                return redirect()->back();

            }
            
        }


    }


    private function showMessage($title, $message){
        $data = [
            'title' => $title,
            'message' => $message
        
        ];

        return view('message', $data);

    }
}
