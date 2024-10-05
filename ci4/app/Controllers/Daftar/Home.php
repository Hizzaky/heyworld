<?php

namespace App\Controllers\Daftar;
use App\Controllers\BaseController;
use App\Models\CustomModel;
use App\Models\RegDosenModel;

class Home extends BaseController
{
    public function index(): string
    {
        helper('form');
        $data = $this->arData();

        if ($this->request->getMethod() == 'post') {

            $rules = $this->rule();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;
                $this->register($_POST);
            } else {
                $data['validasi'] = $this->validator;
            }
        }

        return view('daftar/daftar', $data);
    }
    public function register($data)
    {
        $db = db_connect();
        $customModel = new CustomModel($db);
        $model=new RegDosenModel();

        // $this->pre($data);

        ;
        $data['username']=$data['nidn'];
        if($model->save($data)){
            echo 'upload sukses';
        }else{

            echo 'upload failed';
        }

        // $field = ['username', 'password'];
        // $data = [$username, $password];
        // $tbl = 't_' . lcfirst($kategori);
        // $res = $model->where2($tbl, $field, $data); // validasi username password
        // $ret='';
        // return $ret;
    }
    protected function arData()
    {
        $data = [
            'meta_title' => 'Daftar SIM UMMAT',
            'header_title' => 'Silahkan Lengkapi Form Pendaftaran',
            'kategori' => ['Dosen', 'Prodi', 'Fakultas'],
            'menu' => 'daftar'
        ];
        return $data;
    }
    protected function rule()
    {
        $rules = [
            'nidn' => [
                'rules' => 'required',
                'label' => 'NIDN',
                'errors' => [
                    'required' => 'Inputkan NIDN dengan benar!'
                ]
            ],
            'nama_dosen' => [
                'rules' => 'required',
                'label' => 'Nama Lengkap',
                'errors' => [
                    'required' => 'Inputkan Nama Lengkap Anda dengan benar!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Inputkan Password dengan benar!',
                    'min_length' => 'Password minimal 8 digit!'
                ]
            ],
            'rePassword' => [
                'rules' => 'required|matches[password]'
            ]
        ];
        return $rules;
    }

}
