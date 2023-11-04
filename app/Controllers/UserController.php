<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\AuthService;
use CodeIgniter\Config\Factories;

class UserController extends BaseController
{
    protected $authService;

    public function __construct()
    {
        $this->authService = Factories::class(AuthService::class); // Puxa o UserService

    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $senha = $this->request->getPost('senha');
            $authenticated = $this->authService->authenticate($email, $senha);
            if ($authenticated) {
                // Redirecione para a página principal ou outra página após o login.
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