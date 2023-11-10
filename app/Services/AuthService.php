<?php

namespace App\Services;

use App\Entities\User;
use App\Models\UserModel;
use App\Models\UsuarioModel;
use CodeIgniter\Config\Factories;

class AuthService{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = service('userModel');
        $this->userModel = Factories::models(UserModel::class);
        $this->userModel = new UsuarioModel();
        
    }

    /* 'userModel' => UserModel::class, */
    public function authenticate($email, $senha){

        $user = $this->userModel->getUser($email);
       
        if($user && password_verify($senha, $user->senha)){
           
            $variavalDeSessao = [
                'email' => $user->email,
                'data_login' => bd2br(date('Y-m-d')),
                'data_cad' => $user->created_at,
                'isLoggedIn' => true,
            ];
      
            session()->set($variavalDeSessao);
           
            return true;
        }else{
            session()->setFlashdata('error', 'Usuário inválido');
            return false;
        }
    }

    public function criarUsuario($email, $senha = null, $dados = [])
    {
        $user = new User();
        
        if (!empty($dados)) {
            
            $user->fill($dados);
        } else {
            // Use o email e senha fornecidos como argumentos.
            $user->email = $email;
            $user->senha = $senha;
        }
    
        if ($this->userModel->save($user)) {
            session()->setFlashdata('success', 'Login criado com sucesso');
            return redirect()->to('/livros');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }
    }
    
}
