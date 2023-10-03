<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Livros extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_tipo_livro' => ['type' => 'int', 'constraint' => 11],
            'nome' => ['type' => 'varchar', 'constraint' => 255],
            'autor' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'num_paginas' => ['type' => 'INT', 'constraint' => 5, 'null' => true],
            'editora' => ['type' => 'varchar', 'constraint' => 45, 'null' => true],
            'edicao' => ['type' => 'varchar', 'constraint' => 45, 'null' => true],
            'sinopse' => ['type' => 'text', 'null' => true],
            'categoria' => ['type' => 'varchar', 'constraint' => 50, 'null' => true],
            'ano' => ['type' => 'varchar', 'constraint' => 4, 'null' => true],
            'imagem' => ['type' => 'varchar', 'constraint' => 255],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
            
        ]);          

        $this->forge->addKey('id');
        $this->forge->addKey('id_tipo_livro');
        $this->forge->createTable('livros', true);
    }

    public function down()
    {
        //
    }
}
