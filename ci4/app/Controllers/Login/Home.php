<?php

namespace App\Controllers\Login;
use App\Controllers\BaseController;
use App\Models\CustomModel;
class Home extends BaseController
{
    public function index()
    {
        // echo $kat;
        return redirect()->to('../Home');

        // return redirect()->to(base_url('../Home'));
        // return redirect()->route('/login/sukses');
        // return redirect()->to(base_url('/login/sukses'));
        // return redirect()->back();



    }
    public function dosen()
    {
        helper(['form']);
        $kategori = 'Dosen';
        $data = $this->arData($kategori);

        if ($this->request->getMethod() == 'post') {

            $rules = $this->rule();

            if ($this->validate($rules)) {
                // return redirect()->to(base_url('/login/sukses?s=dosen'));
                $data['post'] = $_POST;
                $this->sukses($data);
            } else {
                $data['validasi'] = $this->validator;
            }
        }

        // $this->cek($_POST);
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
        }
    }
    protected function cek_Kategori($data)
    {
        $ar = explode(" ", $data);
        return $ar[2];
    }
    protected function rule()
    {
        $rules = [
            'username' => [
                'rules' => 'required',
                'label' => 'Usename',
                'errors' => [
                    'required' => 'Inputkan username dengan benar!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Inputkan Password dengan benar!',
                    'min_length' => 'Password minimal 8 digit!'
                ]
            ]
        ];
        return $rules;
    }
    protected function arData($kategori)
    {
        $data = [
            'meta_title' => 'Login ' . $kategori . ' SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'kategori' => $kategori
        ];
        return $data;
    }
    public function sukses($post)
    {
        $db = db_connect();
        $model = new CustomModel($db);
        // $var=$model->find($data);   //command untuk mengambil data dari table

        // $this->pre($post);

        $field = ['username', 'password'];
        $data = [$post['post']['username'], $post['post']['password']];
        $res = $model->where2('t_dosen', $field, $data); // validasi username password

        // $this->pre($post);
        // $this->pre($res);

        // echo count($res);

        if (count($res) > 0) { //verivikasi data login
            // echo 'login sukses <br>';
            $dir = lcfirst($post['kategori']) . '/home';
            // return view('dosen/home', $post);
            // return redirect()->to(base_url('/xxx'));
            return redirect()->to('../Home');
            
        } else {
            // echo 'login failed';
            return redirect()->to('../Home');
        }


        //$model->save($data);   //command untuk push data ke table
        //$var=$model->find($data);   //command untuk mengambil data dari table
        //$model->delete($data);   //command untuk delete data dari table

        // untuk edit, perlu define table_id pada $data dan gunakan $model->save()





    }
    public function pre($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre><hr>';
    }
}
