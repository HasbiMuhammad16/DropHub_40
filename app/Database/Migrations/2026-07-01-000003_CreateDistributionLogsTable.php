<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDistributionLogsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_barang' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_user' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'tanggal_transaksi' => [
                'type' => 'DATETIME',
            ],
            'jumlah_keluar' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'jenis_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
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
        $this->forge->addForeignKey('id_barang', 'items', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('distribution_logs');
    }

    public function down()
    {
        $this->forge->dropTable('distribution_logs');
    }
}
