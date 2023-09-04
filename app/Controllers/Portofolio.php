<?php

namespace App\Controllers;

class Portofolio extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Portofolio'
        ];

        return view('portofolio/index', $data);
    }
}
