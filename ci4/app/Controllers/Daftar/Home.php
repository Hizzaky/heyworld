<?php

namespace App\Controllers\Daftar;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        helper('form');
        $data=$this->arData();

        return view('daftar/daftar',$data);
    }
    protected function arData()
    {
        $data = [
            'meta_title' => 'Daftar SIM UMMAT',
            'header_title' => 'Silahkan Lengkapi Form Pendaftaran',
            'kategori' => ['Dosen','Prodi','Fakultas'],
            'menu'=>'daftar'
        ];
        return $data;
    }
}
