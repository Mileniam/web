<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ListasTareas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'lista_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'proyecto_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);

        $this->forge->addKey('lista_id', true);
        $this->forge->addForeignKey('proyecto_id', 'proyectos', 'proyecto_id');
        $this->forge->createTable('listas_tareas');
    }

    public function down()
    {
        $this->forge->dropTable('listas_tareas');
    }
}
