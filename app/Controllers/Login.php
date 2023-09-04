<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Login'
        ];

        return view('login/index', $data);
    }
}
