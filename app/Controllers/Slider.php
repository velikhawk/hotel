<?php

namespace App\Controllers;

class Slider extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Slider'
        ];

        return view('slider/index', $data);
    }
}
