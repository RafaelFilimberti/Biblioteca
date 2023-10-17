<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Home extends BaseController
{
    public function index (){
        $data = [
            'usuario' => array('nome' => 'Jaqueline', 'email' => 'jaqueline@gmail.com'),
        ];
        return view('usuario', $data);
    }
    public function mostrarUsuario()
    {
        $usuarioModel = new UsuarioModel();
        $data['usuario'] = $usuarioModel->findAll();

        return view('usuario_view', $data);
    }
}
