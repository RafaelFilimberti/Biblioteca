<?php

namespace App\Models;
use App\Entities\User;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $allowedFields    = ['email', 'senha','created_at', 'cpf', 'nome','telefone','data_nascimento'];
    protected $returnType = User::class;

    

    public function getUser($email){
        return $this->where('email', $email)->first();
    }
}

