<?php
namespace App\Models\Daftar;

use App\Models\Daftar\TdosenModel;
use App\Models\Daftar\TprodiModel;
use App\Models\Daftar\TfakultasModel;
use App\Models\CustomModel;
class Daftar
{
    public function register($data,$dir)
    {
        $model = new TdosenModel();
        $model = new TdosenModel();
        $model = new TdosenModel();

        $data['username'] = $data['nidn'];

        if ($model->save($data)) {
            // echo 'upload sukses'; // reidrect to login
            $ret='1';
            
        } else {
            $ret='0';
            // echo 'upload failed';
        }
        return $ret;

    }
    public function cekUser($data)
    {
        $db = db_connect();
        $model = new CustomModel($db);

        // return $data['kategori'][0];
        $kategori = $data['kategori'][0];
        $field = 'nidn';
        $data = $data['post']['nidn'];
        $tbl = 't_' . lcfirst($kategori);
        $res = $model->where1($tbl, $field, $data); // validasi username password

        if (count($res) == 0) {
            $return['cekUser'] = '0';
        } else {
            $return['cekUser'] = '1';
        }

        return $return;
    }
    public function arData()
    {
        $data = [
            'meta_title' => 'Pendaftaran SIM UMMAT',
            'header_title' => 'Silahkan Lengkapi Form Pendaftaran',
            'kategori' => ['Dosen', 'Prodi', 'Fakultas'],
            'menu' => 'daftar'
        ];
        return $data;
    }
    public function rule()
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
                'rules' => 'required|matches[password]',
                'label' => 'Konfirmasi Password',
                'errors' => [
                    'required' => 'Konfirmasi Password tidak sesuai!',
                    'matches' => 'Konfirmasi Password tidak sesuai'
                ]
            ]
        ];
        return $rules;
    }
}