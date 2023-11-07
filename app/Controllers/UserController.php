<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UsuarioModel;
use App\Services\AuthService;
use CodeIgniter\Config\Factories;

class UserController extends BaseController
{
    protected $authService;

    public function __construct()
    {
        $this->usuarioMode = new UsuarioModel();
        $this->authService = Factories::class(AuthService::class); // Puxa o UserService

    }

    public function criarUsuario() {
        // Verifique se o formulário de criação de usuário foi enviado.
        if ($this->request->getMethod() === 'post') {
            $usuario = new User([
                'email' => $this->request->getPost('email'),
                'senha' => password_hash($this->request->getPost('senha'), PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s')
            ]);
    
            // Valide os dados do usuário
            if ($this->usuarioModel->save($usuario)) {
                // Usuário criado com sucesso
                return redirect()->to('/login')->with('success', 'Usuário criado com sucesso!');
            } else {
                // Erro ao criar o usuário
                return redirect()->back()->with('error', 'Erro ao criar o usuário. Por favor, tente novamente.');
            }
        }
    
        // Carregue a view de criação de usuário (formulário de registro)
        return view('criar_usuario');
    }
    
    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $senha = $this->request->getPost('senha');
            $authenticated = $this->authService->authenticate($email, $senha);
            if ($authenticated) {
                redirect()->to('/livros');
            } else {
                echo 'Credenciais inválidas';
            }
        }
        return view('login');
    }

    public function logout()
    {
        
        $this->authService->logout();
        // Redirecione para a página de login ou outra página de sua escolha após o logout.
    }

}