<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data=[
            "meta_title"=> "SIM UMMAT",
            "content"=> "halaman homepage"
        ];
        return view('homepage', $data);
    }
    
        
       
}
