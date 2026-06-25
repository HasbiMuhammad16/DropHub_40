<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Transaction extends BaseController
{
    public function index()
    {
        $model = new TransactionModel();
        $data['transactions'] = $model->getAllWithUser();

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        $data['currentUser'] = session()->get('id');

        return view('transaction/index', $data);
    }

    public function view_details($id = null)
    {
        $model = new TransactionModel();
        $transaction = $model->getDetails($id);

        if (!$transaction) {
            throw new PageNotFoundException("Transaksi tidak ditemukan: {$id}");
        }

        return view('transaction/detail', ['transaction' => $transaction]);
    }

    public function store()
    {
        $model = new TransactionModel();

        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'id_user' => $this->request->getVar('id_user'),
            'tanggal_transaksi' => $this->request->getVar('tanggal_transaksi'),
            'jumlah_keluar' => $this->request->getVar('jumlah_keluar'),
            'jenis_transaksi' => $this->request->getVar('jenis_transaksi'),
        ];

        $model->insert($data);

        return redirect()->to('/transaction');
    }

    public function delete($id)
    {
        $model = new TransactionModel();
        $model->delete($id);

        return redirect()->to('/transaction');
    }
}
