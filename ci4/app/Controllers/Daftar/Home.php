<?php

namespace App\Controllers\Daftar;

use App\Controllers\BaseController;
use App\Models\Daftar\Daftar;

class Home extends BaseController
{
    public function dosen(): string
    {
        $model = new Daftar();

        helper('form');

        $data = $model->arData();

        if ($this->request->getMethod() == 'post') {

            $rules = $model->rule();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;

                $cek = $model->cekUser($data);

                if ($cek['cekUser'] == '0') {

                    $reg=$model->register($_POST,'dosen');
                    if($reg=='1'){
                        // sukses
                        $data['register']='Pendaftaran Berhasil!, Silahkan menunggu proses konfirmasi';
                    }else{
                        // fail
                        $data['fail'] = 'Pendaftaran Gagal!, Silahkan Coba lagi.';
                    }
                } else {
                    $data['fail'] = 'NIDN Sudah Terdaftar!, Silahkan Hubungi Admin.';
                }
            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('daftar/daftar', $data);
    }

}
