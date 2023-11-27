<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Livros extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = ['disponivel' => 'boolean']; // Se 'disponivel' deve ser tratado como booleano

    // Adicionando o getter para disponivel
    public function getDisponivel(): ?bool
    {
        return $this->attributes['disponivel'] ?? null;
    }
}