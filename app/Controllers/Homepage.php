<?php

namespace App\Controllers;

class Homepage extends BaseController
{
    public function index(): string
    {

        $data=[
            "title"=> "SIM UMMAT",
            "content"=> "konten"
        ];
        // echo view('template/header', $data);
        // echo view('homepage');
        // view('template/footer');
        return view('welcome_message', $data);
    }
}
