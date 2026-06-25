<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
                'default' => 0,
            ],
            'lokasi_loker' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'status_aktif' => [
                'type' => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
                'default' => 'aktif',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('items', true);
    }

    public function down()
    {
        $this->forge->dropTable('items', true);
    }
}
