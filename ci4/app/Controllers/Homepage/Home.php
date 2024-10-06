<?php

namespace App\Controllers\Homepage;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        $data=[
            "meta_title"=> "SIM UMMAT",
            "konten"=> "halaman homepage"
        ];
        return view('homepage/homepage', $data);
    }
    
        
       
}
