<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Exemplar extends Migration

{
    public function up()
    {
        $this->forge->addField([

            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_livro' => ['type' => 'int', 'constraint' => 11, 'null' => false],
            'quantidade' => ['type' => 'int', 'constraint' => 11],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);


        $this->forge->addKey('id', true);
        $this->forge->addKey('id_livro');
        $this->forge->createTable('exemplar');
    }

    public function down()
    {
        //
    }
}
