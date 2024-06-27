<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tareas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tarea_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'lista_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'titulo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'descripcion' => [
                'type' => 'TEXT',

            ], 
            'fecha_creacion' => [
                'type' => 'DATE',
            ],
            'fecha_vencimiento' => [
                'type' => 'DATE',
            ],
        ]);

        $this->forge->addKey('tarea_id', true);
        $this->forge->addForeignKey('lista_id', 'listas_tareas', 'lista_id');
        $this->forge->createTable('tareas');
    }

    public function down()
    {
        $this->forge->dropTable('tareas');
    }
}

