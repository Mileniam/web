<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'usuario_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'usuario_nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'correo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'contrasena' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'fecha_creacion' => [
                'type' => 'DATE',
            ],
        ]);

        $this->forge->addKey('usuario_id', true);
        $this->forge->addUniqueKey('correo');
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
