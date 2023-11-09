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
        $this->userModel = Factories::models(UserModel::class);
        $this->userModel = new UsuarioModel();
    }

    
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

    public function createUser($email, $senha){

        $user = new User();
       
        $user->email = $email;
        $user->senha = $senha;
    
        if($this->userModel->save($user)){
            session()->setFlashdata('success', 'Login criado com sucesso');
            return redirect()->to('/');
        }else{
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors()); 
        }

    }
    public function criarUsuario($dados)
    {
        // Valide os dados e crie o usuário no banco de dados
        if ($this->userModel->insert($dados)) {
            return true;
        }

        return false;
    }
}

    

