<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserProfileFieldsToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'birthplace' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'birthdate' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'birthplace');
        $this->forge->dropColumn('users', 'birthdate');
        $this->forge->dropColumn('users', 'address');
    }
}
