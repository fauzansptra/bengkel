<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Queues extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
            'queue_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['menunggu', 'dipanggil', 'selesai', 'dibatalkan'],
                'default'    => 'menunggu',
            ],
            'desc' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'action_by' => [
                'type'       => 'INT',
                'constraint' => 20,
                'unsigned'   => true,
                'null'       => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'deleted_at' => [ // Soft delete column
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('action_by', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addUniqueKey('queue_number');
        $this->forge->createTable('queues');
    }

    public function down()
    {
        $this->forge->dropTable('queues');
    }
}
