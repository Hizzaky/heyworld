<?php

namespace App\Controllers\Login;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {

        // return redirect()->to(base_url('../Home'));
        return redirect()->to('../Home');
        // return redirect()->route('/login/sukses');
        // return redirect()->to(base_url('/login/sukses'));
        // return redirect()->back();

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
                // return redirect()->to(base_url('/login/sukses?s=dosen'));
                $this->sukses($data);
            } else {
                $data['validasi'] = $this->validator;
            }
        }

        $this->cek($_POST);
        return view('login/login', $data);

    }
    public function prodi()
    {
        helper(['form']);
        $data = [
            'meta_title' => 'Login Prodi SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'kategori' => 'Prodi'
        ];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required',
                'password' => 'required|min_length[8]'
            ];
            if ($this->validate($rules)) {
                // return redirect()->to(base_url('/login/sukses?s=prodi'));
                $this->sukses($data);
            } else {
                $data['validasi'] = $this->validator;
            }
        }

        $this->cek($_POST);
        return view('login/login', $data);


    }
    public function fakultas()
    {
        helper(['form']);
        $data = [
            'meta_title' => 'Login Fakultas SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'kategori' => 'Fakultas'
        ];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required',
                'password' => 'required|min_length[8]'
            ];
            if ($this->validate($rules)) {
                // return redirect()->to(base_url('/login/sukses?s=fakultas'));
                $this->sukses($data);
            } else {
                $data['validasi'] = $this->validator;
            }
        }

        $this->cek($_POST);
        return view('login/login', $data);
    }

//----------------------------------------------------------------------------------------------------------------------------------
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
    public function sukses($post)
    {
        echo "<pre>";
        print_r($post);
        echo "</pre>"; 
        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre><hr>";
        // echo $isset=isset($_GET)? $_GET['s'] : "kosong";
        // echo '<br>';

    //   echo   $kategori=$post['kategori'];

        // if ($kategori=='dosen') {
        //             echo $kategori;

        // }
        // if ($kategori=='prodi') {
        //             echo $kategori;

        // }
        // if ($kategori=='fakultas') {
        //             echo $kategori;

        // }

        //         echo 'fail';



    }
}
