<?php

namespace App\Controllers;

class Tes extends BaseController
{
    public function index()
    {
        // return redirect()->to('Homepage/');

        return view('tes/modal'); 
    }
}