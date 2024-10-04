<?php

namespace App\Controllers;

class Home extends BaseController
{
    // public function index(): 
    // {
        // $data=[
        //     "meta_title"=> "SIM UMMAT",
        //     "content"=> "halaman homepage"
        // ];
        // return view('homepage', $data);
        // return redirect()->to('Homepage/');
        
    // }
    
    public function index(){
        return redirect()->to('homepage/');

    }
    
        
       
}
