<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $allowedFields    = ['email', 'senha', 'created_at'];
    protected $returnType = User::class;

    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'senha' => 'required|min_length[6]',
        'CPF' => 'required|numeric|exact_length[11]',
        'telefone' => 'numeric|min_length[6]',
        'data_de_nascimento' => 'valid_date',
    ];

    public function getUser($email){
        return $this->where('email', $email)->first();
    }
}

