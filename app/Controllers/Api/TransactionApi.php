<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use App\Models\TransactionModel;
use CodeIgniter\HTTP\Response;

class TransactionApi extends BaseController
{
    public function index()
    {
        $model = new TransactionModel();
        $transactions = $model->getAllWithUser();

        return $this->response->setJSON(['data' => $transactions]);
    }

    public function create()
    {
        $payload = $this->request->getJSON(true);

        if (empty($payload['id_barang']) || empty($payload['id_user']) || empty($payload['jenis_transaksi']) || ! isset($payload['jumlah_keluar'])) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'Payload invalid. id_barang, id_user, jumlah_keluar, jenis_transaksi diperlukan.']);
        }

        $itemId   = $payload['id_barang'];
        $quantity = (int) $payload['jumlah_keluar'];
        $jenis    = $payload['jenis_transaksi'];

        if (! in_array($jenis, ['masuk', 'keluar'], true)) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'jenis_transaksi harus "masuk" atau "keluar".']);
        }

        if ($quantity <= 0) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'jumlah_keluar harus lebih besar dari 0.']);
        }

        $itemModel = new ItemModel();
        $item = $itemModel->find($itemId);

        if (! $item) {
            return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)
                ->setJSON(['error' => 'Item tidak ditemukan.']);
        }

        if ($jenis === 'keluar' && $quantity > $item['stok']) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'Jumlah melebihi stok saat ini.']);
        }

        $updatedStock = $jenis === 'keluar'
            ? $item['stok'] - $quantity
            : $item['stok'] + $quantity;

        $itemModel->update($itemId, ['stok' => $updatedStock]);

        $model = new TransactionModel();
        $id = $model->insert([
            'id_barang'          => $itemId,
            'id_user'            => $payload['id_user'],
            'tanggal_transaksi'  => date('Y-m-d H:i:s'),
            'jumlah_keluar'      => $quantity,
            'jenis_transaksi'    => $jenis,
        ]);

        if (! $id) {
            return $this->response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)
                ->setJSON(['error' => 'Gagal menyimpan transaksi.']);
        }

        return $this->response->setStatusCode(Response::HTTP_CREATED)
            ->setJSON(['message' => 'Transaksi dibuat.', 'data' => $model->getWithDetails($id)]);
    }

    public function update($id = null)
    {
        if (! $id) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'ID transaksi diperlukan.']);
        }

        $model = new TransactionModel();
        $transaction = $model->find($id);

        if (! $transaction) {
            return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)
                ->setJSON(['error' => 'Transaksi tidak ditemukan.']);
        }

        $payload = $this->request->getJSON(true);
        $allowed = ['jumlah_keluar', 'jenis_transaksi'];
        $data = array_intersect_key($payload ?? [], array_flip($allowed));

        if (empty($data)) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'Tidak ada field valid untuk diperbarui (jumlah_keluar, jenis_transaksi).']);
        }

        if (isset($data['jumlah_keluar'])) {
            $data['jumlah_keluar'] = (int) $data['jumlah_keluar'];
        }

        $model->update($id, $data);

        return $this->response->setJSON(['message' => 'Transaksi diperbarui.', 'data' => $model->getWithDetails($id)]);
    }

    public function delete($id = null)
    {
        if (! $id) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'ID transaksi diperlukan.']);
        }

        $model = new TransactionModel();
        $transaction = $model->find($id);

        if (! $transaction) {
            return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)
                ->setJSON(['error' => 'Transaksi tidak ditemukan.']);
        }

        $model->delete($id);

        return $this->response->setJSON(['message' => 'Transaksi dihapus.', 'data' => $transaction]);
    }
}
