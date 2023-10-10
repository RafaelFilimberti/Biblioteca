<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nome' => ['type' => 'varchar', 'constraint' => 100],
            'cpf' => ['type' => 'varchar', 'constraint' => 15],
            'telefone' => ['type' => 'varchar', 'constraint' => 15, 'null' => true],
            'data_nascimento' => ['type' => 'date', 'null' => true],
            'email' => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'usuario' => ['type' => 'varchar', 'constraint' => 100],
            'senha' => ['type' => 'varchar', 'constraint' => 255],
            'administrador' => ['type' => 'tinyint', 'constraint' => 1],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id');
        $this->forge->createTable('usuarios', true);
    }

    public function down()
    {
        //$this->forge->dropTable('usuarios');
    }
}