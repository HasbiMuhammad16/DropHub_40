<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'distribution_logs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id_barang',
        'id_user',
        'tanggal_transaksi',
        'jumlah_keluar',
        'jenis_transaksi',
    ];

    public function getAllWithUser(): array
    {
        return $this->select('distribution_logs.*, users.username as operator')
            ->join('users', 'users.id = distribution_logs.id_user', 'left')
            ->orderBy('distribution_logs.tanggal_transaksi', 'DESC')
            ->findAll();
    }

    public function getDetails($id)
    {
        return $this->select('distribution_logs.*, users.username as operator')
            ->join('users', 'users.id = distribution_logs.id_user', 'left')
            ->where('distribution_logs.id', $id)
            ->first();
    }
}
