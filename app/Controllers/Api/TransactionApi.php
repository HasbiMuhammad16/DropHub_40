<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\TransactionModel;

class TransactionApi extends BaseController
{
    public function index()
    {
        $model = new TransactionModel();
        $transactions = $model->getAllWithUser();

        return $this->response->setJSON(['data' => $transactions]);
    }
}
