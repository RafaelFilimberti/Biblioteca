<?php

namespace App\Models;

use App\Entities\Livros;
use CodeIgniter\Model;

class LivrosModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'livros';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Livros::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'autor','num_paginas', 'editora', 'edicao', 'sinopse' ,'categoria', 'ano', 'imagem']; //campos que altera no bvanco 

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}

/* 
public function isLivroDisponivel($livroId){
    $livro = $this->find($livroId);
    return ($livro && $livro['disponivel'] == 1);
} */