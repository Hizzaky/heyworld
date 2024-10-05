<?php

namespace App\Controllers\Dosen;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        $data=$this->arData();
        return view('dosen/home',$data);
    }

    protected function arData()
    {
        $data = [
            'meta_title' => 'Welcome Dosen UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'kategori' => 'Dosen',
            'konten' => 'login berhasil'
        ];
        return $data;
    }
}
