<?php

namespace App\Controllers;

use App\Models\ItemModel;

class Item extends BaseController
{
    private ItemModel $model;

    public function __construct()
    {
        $this->model = new ItemModel();
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

        $data['items'] = $this->model->findAll();
        return view('item/index', $data);
    }

    public function create()
    {
        if ($response = $this->requireLogin()) {
            return $response;
        }

        return view('item/form', [
            'action' => 'create',
            'item' => null,
        ]);
    }

    public function store()
    {
        if ($response = $this->requireLogin()) {
            return $response;
        }

        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'kategori' => $this->request->getVar('kategori'),
            'stok' => (int) $this->request->getVar('stok'),
            'lokasi_loker' => $this->request->getVar('lokasi_loker'),
            'status_aktif' => $this->request->getVar('status_aktif') ?: 'aktif',
        ];

        $this->model->insert($data);
        return redirect()->to('/item');
    }

    public function edit($id)
    {
        if ($response = $this->requireLogin()) {
            return $response;
        }

        $item = $this->model->find($id);
        if (! $item) {
            return redirect()->to('/item');
        }

        return view('item/form', [
            'action' => 'edit',
            'item' => $item,
        ]);
    }

    public function update($id)
    {
        if ($response = $this->requireLogin()) {
            return $response;
        }

        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'kategori' => $this->request->getVar('kategori'),
            'stok' => (int) $this->request->getVar('stok'),
            'lokasi_loker' => $this->request->getVar('lokasi_loker'),
            'status_aktif' => $this->request->getVar('status_aktif') ?: 'aktif',
        ];

        $this->model->update($id, $data);
        return redirect()->to('/item');
    }

    public function delete($id)
    {
        if ($response = $this->requireLogin()) {
            return $response;
        }

        $this->model->delete($id);
        return redirect()->to('/item');
    }
}
