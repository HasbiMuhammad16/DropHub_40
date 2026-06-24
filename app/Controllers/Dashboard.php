<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        if(!$session->get('logged_in')){
            return redirect()->to('/login');
        }
        
        $data['username'] = $session->get('username');
        $data['role'] = $session->get('role');
        
        return view('dashboard', $data);
    }
}