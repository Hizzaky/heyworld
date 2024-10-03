<?php

namespace App\Controllers\Login;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        echo 'kok ga muncul';

        // return redirect()->to(base_url('../Home'));
        // return redirect()->to('../../Home');
        // return redirect()->route('/login/sukses');
        // return redirect()->to(base_url('/login/sukses'));




    }
    public function dosen()
    {
        helper(['form']);

        $data = [
            'meta_title' => 'Login Dosen SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'kategori' => 'Dosen'
        ];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required',
                'password' => 'required|min_length[8]'
            ];
            if ($this->validate($rules)) {
                // return redirect()->to('google.com');
                // return redirect()->route('/login/sukses');
                return redirect()->to(base_url('/login/sukses'));
                // return redirect()->back();
                // return redirect()->route('sukses');
                // exit;

                // echo 'validasi berhasil';






            } else {
                $data['validasi'] = $this->validator;
            }
        }

        $this->cek($_POST);
        return view('login/login', $data);

    }
    public function prodi()
    {
        $data = [
            'meta_title' => 'Login Prodi SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'kategori' => 'Prodi'
        ];

        $this->cek($_POST);
        return view('login/login', $data);


    }
    public function fakultas()
    {
        $data = [
            'meta_title' => 'Login Fakultas SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'kategori' => 'Fakultas'
        ];

        $this->cek($_POST);
        return view('login/login', $data);
    }

    protected function login_view($data)
    {

        // echo view('template/homepage/header', $data);
        // echo view('login/login');
        // echo view('template/homepage/footer');

        // return view('homepage', $data);
    }

    protected function cek($data)
    {
        if ($data) {
            $data['submit'] = $this->cek_Kategori($data['submit']);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
        }
    }
    protected function cek_Kategori($data)
    {
        $ar = explode(" ", $data);
        return $ar[2];
    }
    public function sukses()
    {
        return 'validasi berhasil';
    }
}
