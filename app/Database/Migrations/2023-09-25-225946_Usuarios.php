<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_tipo_livro' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'nome' => ['type' => 'varchar', 'constraint' => 100],
            'cpf' => ['type' => 'varchar', 'constraint' => 15],
            'telefone' => ['type' => 'varchar', 'constraint' => 15],
            'data_nascimento' => ['type' => 'date', 'null' => true],
            'email' => ['type' => 'varchar', 'constrain' => 100],
            'usuario' => ['type' => 'varchar', 'constrain' => 100],
            'senha' => ['type' => 'varchar', 'constrain' => 255],
            'administrador' => [['type' => 'int', 'constraint' => 11],],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('livros', true);
    }

    public function down()
    {
        //
    }
}
