<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\TransactionModel;

class Transaction extends BaseController
{
    private TransactionModel $transactionModel;
    private ItemModel $itemModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->itemModel = new ItemModel();
    }

    private function requireLogin()
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return null;
    }

    public function index()
    {
        if ($response = $this->requireLogin()) {
            return $response;
        }

        $data['items'] = $this->itemModel->findAll();
        $data['transactions'] = $this->transactionModel->getAllWithUser();
        return view('transaction/index', $data);
    }

    public function store()
    {
        if ($response = $this->requireLogin()) {
            return $response;
        }

        $itemId = $this->request->getVar('item_id');
        $quantity = (int) $this->request->getVar('jumlah_keluar');
        $jenis = $this->request->getVar('jenis_transaksi');

        $item = $this->itemModel->find($itemId);
        if (! $item) {
            session()->setFlashdata('error', 'Item tidak ditemukan.');
            return redirect()->to('/transaction');
        }

        if ($quantity <= 0) {
            session()->setFlashdata('error', 'Jumlah transaksi harus lebih besar dari 0.');
            return redirect()->to('/transaction');
        }

        if ($jenis === 'keluar' && $quantity > $item['stok']) {
            session()->setFlashdata('error', 'Jumlah melebihi stok saat ini.');
            return redirect()->to('/transaction');
        }

        $updatedStock = $item['stok'];
        if ($jenis === 'keluar') {
            $updatedStock = $item['stok'] - $quantity;
        } elseif ($jenis === 'masuk') {
            $updatedStock = $item['stok'] + $quantity;
        }

        $this->itemModel->update($itemId, ['stok' => $updatedStock]);

        $this->transactionModel->insert([
            'id_barang' => (string) $itemId,
            'id_user' => session()->get('id'),
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'jumlah_keluar' => $quantity,
            'jenis_transaksi' => $jenis,
        ]);

        return redirect()->to('/transaction');
    }

    public function view_details($id)
    {
        if ($response = $this->requireLogin()) {
            return $response;
        }

        $transaction = $this->transactionModel->getWithDetails($id);
        if (! $transaction) {
            return redirect()->to('/transaction');
        }

        return view('transaction/detail', ['transaction' => $transaction]);
    }

    public function delete($id)
    {
        if ($response = $this->requireLogin()) {
            return $response;
        }

        $this->transactionModel->delete($id);
        return redirect()->to('/transaction');
    }
}
