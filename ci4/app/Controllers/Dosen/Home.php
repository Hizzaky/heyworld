<?php

namespace App\Controllers\Dosen;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        return 'redirect login dosen sukses';
        // return view('dosen/home');
    }
}
