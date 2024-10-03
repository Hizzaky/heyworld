<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data=[
            "meta_title"=> "SIM UMMATMMMMMMMMMMMMMMMMMMMM",
            "content"=> "halaman homepage"
        ];
        // return view('template/homepage/header', $data);
        return view('homepage', $data);
        // return view('template/homepage/footer');
        // return view('welcome_message', $data);
        // return redirect()->to('Homepage');
    }
    
        
       
}
