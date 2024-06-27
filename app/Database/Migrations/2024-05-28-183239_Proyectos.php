<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Proyectos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'proyecto_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'perfil_id' => [
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
        ]);

        $this->forge->addKey('proyecto_id', true);
        $this->forge->addForeignKey('perfil_id', 'perfiles', 'perfil_id');
        $this->forge->createTable('proyectos');
    }

    public function down()
    {
        $this->forge->dropTable('proyectos');
    }
}
