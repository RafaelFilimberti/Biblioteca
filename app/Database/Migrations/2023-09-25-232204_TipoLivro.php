<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TipoLivro extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nome' => ['type' => 'varchar', 'constraint' => 100],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);


        $this->forge->addKey('id', true);
        $this->forge->createTable('tipo_livro');
    }

    public function down()
    {
        //
    }
}
