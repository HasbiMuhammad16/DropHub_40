<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDistributionLogs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => false,
                'auto_increment' => true,
            ],
            'id_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => false,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tanggal_transaksi' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'jumlah_keluar' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
                'default' => 0,
            ],
            'jenis_transaksi' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
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
        $this->forge->addKey('id_user');
        // foreign key omitted for testing flexibility
        $this->forge->createTable('distribution_logs', true);
    }

    public function down()
    {
        $this->forge->dropTable('distribution_logs', true);
    }
}
