<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tipo_rol_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'funcion' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);

        $this->forge->addKey('tipo_rol_id', true);
        $this->forge->createTable('tiposroles');
    }

    public function down()
    {
        $this->forge->dropTable('tiposroles');
    }
}
