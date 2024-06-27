<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TiposNeurodivergencia extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tipo_neurodivergencia_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this->forge->addKey('tipo_neurodivergencia_id', true);
        $this->forge->createTable('tiposneurodivergencia');
    }

    public function down()
    {
        $this->forge->dropTable('tiposneurodivergencia');
    }
}
