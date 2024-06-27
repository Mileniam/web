<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perfiles extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'perfil_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'usuario_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nombre_completo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tipo_neurodivergencia' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'rol' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('perfil_id', true);
        $this->forge->addForeignKey('usuario_id', 'usuarios', 'usuario_id');
        $this->forge->addForeignKey('rol', 'roles', 'tipo_rol_id');
        $this->forge->addForeignKey('tipo_neurodivergencia', 'tiposneurodivergencia', 'tipo_neurodivergencia_id');
        $this->forge->createTable('perfiles');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('perfiles');
    }
}

