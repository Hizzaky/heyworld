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
        // $data['content']=$kategori ? $kategori : $data['content'];
        return view('homepage/homepage', $data);
    }
    
        
       
}
