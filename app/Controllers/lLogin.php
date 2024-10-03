<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function dosen()
    {
        $data = [
            'meta_title' => 'Login Dosen SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun Dosen',
            'uri'=>'dosen'
        ];
        if ($_POST) {
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
        }
        $this->login_view($data);

    }
    public function prodi()
    {
        $data = [
            'meta_title' => 'Login Prodi SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun Prodi',
            'uri' => 'prodi'
        ];

        
        $this->login_view($data);

    }
    public function fakultas()
    {
        $data = [
            'meta_title' => 'Login Prodi SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun Fakultas',
            'uri' => 'prodi'
        ];
        $this->login_view($data);
    }
    protected function login_view($data){
       
        echo view('template/homepage/header', $data);
        echo view('login/'.$data['uri']);
        echo view('template/homepage/footer');
    }
}
