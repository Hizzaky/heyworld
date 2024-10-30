<?php

namespace App\Controllers;

class Tes extends BaseController
{
    public function index()
    {

        $title = [
            'meta_title' => 'SIM UMMAT',
            'header_title' => 'Penguasaan Pengetahuan',
            'sub_title' => 'Sub Penguasaan Pengetahuan',
            'sidePp' => 'active',
            'menuPpAdd' => 'active'
        ];

        $data = $this->arData($title, session()->get('login'));


        return view('tes/modal',$data); 
    }
}