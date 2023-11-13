<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UsuarioModel;
use App\Services\AuthService;
use CodeIgniter\Config\Factories;


class UserController extends BaseController
{
    protected $authService, $usuarioModel, $session;
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'nome' => 'required|min_length[6]|',
        'senha' => 'required|min_length[6]',
        'CPF' => 'required|numeric|exact_length[11]',
        'telefone' => 'numeric|min_length[6]',
        'data_de_nascimento' => 'valid_date',
    ];

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();

        $this->authService = Factories::class(AuthService::class);
        /* helper('aux'); */
    }

    public function index()
    {
        return view('criar_usuario');
    }

    public function criarUsuario()
    {

        // Verifique se o formulário de criação de usuário foi enviado
        if ($this->request->getMethod() === 'post') {
            $usuarios = new User([
                'email' => $this->request->getPost('email'),
                'nome' => $this->request->getPost('nome'),
                'cpf' => $this->request->getPost('cpf'),
                'telefone' => $this->request->getPost('telefone'),
                'data_de_nascimento' => $this->request->getPost('telefone'),
                'senha' => password_hash($this->request->getPost('senha'), PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s')
            ]);

            // Valide os dados do usuário
            if ($this->usuarioModel->save($usuarios)) {

                return redirect()->to('/login')->with('success', 'Usuário criado com sucesso!');
            } else {

                return redirect()->back()->with('error', 'Erro ao criar o usuário. Por favor, tente novamente.');
            }
        }/* 
        debug($usuarios); */

        // Carregua a view 
        return view('criar_usuario');
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $senha = $this->request->getPost('senha');
            $authenticated = $this->authService->authenticate($email, $senha);
            /* debug($authenticated); */
            if ($authenticated) {
                return redirect()->to('/livros');
            } else {
                return view('login');
                echo 'Credenciais inválidas';
            }
        } else {
            return view('login');
        }
    }

    public function logout()
    {

        $this->authService->logout();
        // Redirecione para a página de login ou outra página de sua escolha após o logout.
    }
}
