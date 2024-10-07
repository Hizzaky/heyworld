<?php
namespace App\Models\Daftar;

use App\Models\Daftar\TdosenModel;
use App\Models\Daftar\TprodiModel;
use App\Models\Daftar\TfakultasModel;
use App\Models\CustomModel;
class Daftar
{
    public function register($kategori, $data)
    {
        if ($kategori == 'dosen') {
            $model = new TdosenModel();
        }
        if ($kategori == 'dosen') {

            $model = new TprodiModel();
        }
        if ($kategori == 'dosen') {

            $model = new TfakultasModel();
        }

        $data['username'] = $data['nidn'];

        if ($model->save($data)) {
            $ret = '1';
        } else {
            $ret = '0';
        }
        return $ret;
    }
    public function cekUser($field, $data)
    {
        $db = db_connect();
        $model = new CustomModel($db);

        $kategori = $data['kategori'][0];
        $tbl = 't_' . lcfirst($kategori);
        $res = $model->where1($tbl, $field, $data); // validasi username password

        if (count($res) == 0) {
            $return['cekUser'] = '0';
        } else {
            $return['cekUser'] = '1';
        }
        return $return;
    }
    public function arData($jenis_user)
    {
        $data = [
            'meta_title' => 'Pendaftaran SIM UMMAT',
            'header_title' => 'Silahkan Lengkapi Form Pendaftaran',
            // 'jenis_user' => ['Dosen', 'Prodi', 'Fakultas'],
            'jenis_user' => $jenis_user,
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