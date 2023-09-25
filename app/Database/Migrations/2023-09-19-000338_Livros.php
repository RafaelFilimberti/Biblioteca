<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Livros extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nome' => ['type' => 'varchar', 'constraint' => 255],
            'autor' => ['type' => 'varchar', 'constraint' => 255],
            'num_paginas' => ['type' => 'INT', 'constraint' => 5],
            'editora' => ['type' => 'varchar', 'constrain' => 45],
            'edicao' => ['type' => 'varchar', 'constrain' => 45],
            'sinopse' => ['type' => 'text'],
            'categoria' => ['type' => 'varchar', 'constrain' => 50],
            'ano' => ['type' => 'varchar', 'constraint' => 4],
            'imagem' => ['type' => 'varchar', 'constrain' => 255],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],

        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('livros', true);
    }

    public function down()
    {
        //
    }
}
