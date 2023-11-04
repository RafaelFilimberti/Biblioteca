<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Login extends Entity
{

    private $id;
    private $email;
    private $password;

    public function __construct ($id, $email, $senha) {
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
    }

    // Métodos getters e setters, se necessário
}
?>