<?php

namespace App\Controllers;

class Role extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Role - Hak Akses'
        ];

        return view('role/index', $data);
    }
}
