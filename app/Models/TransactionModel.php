<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'distribution_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_barang', 'id_user', 'tanggal_transaksi', 'jumlah_keluar', 'jenis_transaksi'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAllWithUser()
    {
        return $this->select('distribution_logs.*, users.username AS user_name, items.nama_barang AS item_name, items.lokasi_loker')
            ->join('users', 'users.id = distribution_logs.id_user', 'left')
            ->join('items', 'items.id = distribution_logs.id_barang', 'left')
            ->orderBy('tanggal_transaksi', 'DESC')
            ->findAll();
    }

    public function getWithDetails($id)
    {
        return $this->select('distribution_logs.*, users.username AS user_name, items.nama_barang AS item_name, items.kategori AS item_category, items.lokasi_loker')
            ->join('users', 'users.id = distribution_logs.id_user', 'left')
            ->join('items', 'items.id = distribution_logs.id_barang', 'left')
            ->where('distribution_logs.id', $id)
            ->first();
    }
}
