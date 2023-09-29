<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReservaLivro extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_reserva' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'id_livro' => ['type' => 'int', 'constraint' => 11],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);


        $this->forge->addKey('id', true);
        $this->forge->createTable('reservalivro');
        $this->forge->addKey('id_reserva');
        $this->forge->addKey('id_livro');
    }


    public function down()
    {
        //
    }
}

   
