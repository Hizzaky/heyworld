<?php

namespace App\Controllers\Daftar;

use App\Controllers\BaseController;
use App\Models\Daftar\Daftar;

class Home extends BaseController
{
    public function index(): string
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

                    $model->register($_POST);
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
