<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $model = new UserModel();
        $data['users'] = $model->findAll();

        return view('user_list', $data);
    }
}