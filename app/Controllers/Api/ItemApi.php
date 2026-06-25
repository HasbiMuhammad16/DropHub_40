<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use CodeIgniter\HTTP\Response;

class ItemApi extends BaseController
{
    public function index()
    {
        $model = new ItemModel();
        $items = $model->findAll();

        return $this->response->setJSON(['data' => $items]);
    }

    public function create()
    {
        $payload = $this->request->getJSON(true);

        if (empty($payload['nama_barang']) || empty($payload['kategori']) || ! isset($payload['stok']) || empty($payload['lokasi_loker'])) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'Payload invalid. nama_barang, kategori, stok, lokasi_loker diperlukan.']);
        }

        $model = new ItemModel();
        $data = [
            'nama_barang' => $payload['nama_barang'],
            'kategori' => $payload['kategori'],
            'stok' => (int) $payload['stok'],
            'lokasi_loker' => $payload['lokasi_loker'],
            'status_aktif' => $payload['status_aktif'] ?? 'aktif',
        ];

        $id = $model->insert($data);

        if (! $id) {
            return $this->response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)
                ->setJSON(['error' => 'Gagal menyimpan data item.']);
        }

        $item = $model->find($id);
        return $this->response->setStatusCode(Response::HTTP_CREATED)
            ->setJSON(['message' => 'Item dibuat.', 'data' => $item]);
    }

    public function update($id = null)
    {
        if (! $id) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'ID item diperlukan.']);
        }

        $payload = $this->request->getJSON(true);
        if (! isset($payload['stok'])) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'Field stok diperlukan.']);
        }

        $model = new ItemModel();
        $item = $model->find($id);

        if (! $item) {
            return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)
                ->setJSON(['error' => 'Item tidak ditemukan.']);
        }

        $data = ['stok' => (int) $payload['stok']];
        $model->update($id, $data);

        return $this->response->setJSON(['message' => 'Stok item diperbarui.', 'data' => $model->find($id)]);
    }

    public function delete($id = null)
    {
        if (! $id) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'ID item diperlukan.']);
        }

        $model = new ItemModel();
        $item = $model->find($id);

        if (! $item) {
            return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)
                ->setJSON(['error' => 'Item tidak ditemukan.']);
        }

        $model->delete($id);
        return $this->response->setJSON(['message' => 'Item dihapus.', 'data' => $item]);
    }
}
