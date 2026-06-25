<?php

namespace App\Controllers;

use App\Models\ItemModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Item extends BaseController
{
    public function index()
    {
        $model = new ItemModel();
        $data['items'] = $model->orderBy('id', 'DESC')->findAll();
        return view('item/index', $data);
    }

    public function create()
    {
        return view('item/create');
    }

    public function store()
    {
        $model = new ItemModel();
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'kategori' => $this->request->getVar('kategori'),
            'stok' => $this->request->getVar('stok'),
            'lokasi_loker' => $this->request->getVar('lokasi_loker'),
            'status_aktif' => $this->request->getVar('status_aktif'),
        ];
        $model->insert($data);
        return redirect()->to('/item');
    }

    public function edit($id = null)
    {
        $model = new ItemModel();
        $item = $model->find($id);

        if (!$item) {
            throw new PageNotFoundException("Item tidak ditemukan: {$id}");
        }

        return view('item/edit', ['item' => $item]);
    }

    public function update($id = null)
    {
        $model = new ItemModel();
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'kategori' => $this->request->getVar('kategori'),
            'stok' => $this->request->getVar('stok'),
            'lokasi_loker' => $this->request->getVar('lokasi_loker'),
            'status_aktif' => $this->request->getVar('status_aktif'),
        ];
        $model->update($id, $data);
        return redirect()->to('/item');
    }

    public function delete($id = null)
    {
        $model = new ItemModel();
        $model->delete($id);
        return redirect()->to('/item');
    }
}
