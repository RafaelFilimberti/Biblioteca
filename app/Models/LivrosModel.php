<?php

namespace App\Models;

use App\Entities\Livros;
use CodeIgniter\Model;

class LivrosModel extends Model
{
    protected $returnType       = Livros::class;
    protected $DBGroup          = 'default';
    protected $table            = 'livros';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
<<<<<<< Updated upstream
    protected $allowedFields    = ['nome', 'autor', 'sinopse', 'sinopse' ,'categoria', 'ano'];
=======
    protected $allowedFields    = ['nome', 'autor', 'num_paginas', 'editora', 'edicao', 'sinopse', 'categoria', 'ano', 'imagem']; // campos que alteram no banco 
>>>>>>> Stashed changes

    // Dates
    protected $useTimestamps = true;
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
<<<<<<< Updated upstream
=======

 /*    public function isLivroDisponivel($id)
{
    $livro = $this->find($id);

    // Verifica se $livro é um objeto e se a propriedade 'disponivel' existe
    if (is_object($livro) && property_exists($livro, 'disponivel') && $livro->disponivel == 1) {
        // Agora, faz uma verificação no banco para garantir a disponibilidade atualizada
        $livroAtualizado = $this->find($id);
        return $livroAtualizado && $livroAtualizado->disponivel == 1;
    }

    return false;
} */
    
>>>>>>> Stashed changes
}
