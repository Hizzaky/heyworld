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
                // return redirect()->to(base_url('../dosen'));
                // $this->sukses($data);
                // return redirect()->to(base_url(('/sukses/'. $_POST['username'].'/'.$_POST['password'].'/'.$kategori)));
                return redirect()->to('/Login/sukses/' . $_POST['username'] . '/' . $_POST['password'] . '/' . $kategori);
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
                // $this->sukses($data);
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
                // $this->sukses($data);
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
                    'required' => 'Inputkan Username dengan benar!'
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
            'kategori' => $kategori,
            'menu'=>'login'
        ];
        return $data;
    }
    public function sukses($username,$password,$kategori)
    {
        $db = db_connect();
        $model = new CustomModel($db);
        
        echo $username;
        echo '<br>';
        echo $password;
        echo '<br>';
        echo $kategori;

        $field = ['username', 'password'];
        $data = [$username, $password];
        $tbl='t_'.lcfirst($kategori);
        $res = $model->where2($tbl, $field, $data); // validasi username password

        // $this->pre($post);
        // $this->pre($res);

        // echo count($res);
        // return redirect()->to(base_url('dosen'));
        // return redirect()->to('dosen');
        
        
        if (count($res) > 0) { //verivikasi data login
            // $dir = lcfirst($kategori['kategori']) . '/home';
            $dir=lcfirst($kategori);
            return redirect()->to($dir);
            // return redirect()->to('../Home');
            
        } else {
            return redirect()->to('/fakultas');
        }
        
        // return view('dosen/home', $post);

        //$model->save($data);   //command untuk push data ke table
        //$var=$model->find($data);   //command untuk mengambil data dari table
        //$model->delete($data);   //command untuk delete data dari table

        // untuk edit, perlu define table_id pada $data dan gunakan $model->save()





    }
    
}
