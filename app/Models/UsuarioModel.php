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
        'email' => 'required|valid_email|is_unique[users.emaissl]',  //regras de validações, que sao avaliadas do que está na view 
        'senha' => 'required|min_length[6]',
    ];

    public function getUser($email){
      
        return $this->where('email', $email)->first();
    }
}
