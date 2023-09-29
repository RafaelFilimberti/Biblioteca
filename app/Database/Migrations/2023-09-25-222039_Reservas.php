<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reservas extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_usuario' => ['type' => 'int', 'constraint' => 11, 'null' => false],
            'data_inicio' => ['type' => 'date', 'null' => true],
            'data_fim' => ['type' => 'date', 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);


        $this->forge->addKey('id', true);
        $this->forge->addKey('id_usuario');
        $this->forge->createTable('reservas');
    }

    public function down()
    {
        //
    }
}
