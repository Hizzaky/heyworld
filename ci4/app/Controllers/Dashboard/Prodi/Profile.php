<?php

namespace App\Controllers\Dashboard\Prodi;

use App\Controllers\BaseController;
use App\Models\Dashboard\Prodi\ProfileModel;
use App\Models\Dashboard\Prodi\Table\NamaModel;
use App\Models\Dashboard\Prodi\Table\PassModel;

class Profile extends BaseController
{
    public function index(){
        $sesi = session();
        $data = $sesi->get('login');
        if (isset($data['jenis_user'])) {
            if ($data['jenis_user'] != 'Prodi') {
                // return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }

        // return redirect('update-nama');

        $model = new ProfileModel();
        $data['side'] = '1';

        $data = $this->arData($model->title(), $sesi->get('login'));

        return view('dashboard/prodi/profileNama', $data);

    }
    public function update_nama()
    {
        helper('form');
        $sesi = session();
        $model = new ProfileModel();
        $modelTbl = new NamaModel();

        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['login'] = $sesi->get('login');
        $data['side'] = '1';

        // if (request()->getMethod() == 'post') {
        //     $rules = $model->rules();

        //     if ($this->validate($rules)) {
        //         $getData = $modelTbl->find($data['login']['user_id']);
        //         $_POST['prodi_id'] = $data['login']['user_id'];
        //         $modelTbl->save($_POST);

        //         if ($modelTbl) {
        //             $sesi->setFlashdata('sukses', 'Update Berhasil!');
        //             $getData = $modelTbl->find($data['login']['user_id']);

        //             $dataUser = $this->userData($getData, $data['jenis_user']);
        //             $sesi->set('login', $dataUser);
        //             $data['login'] = $sesi->get('login');
        //         } else {
        //             $sesi->setFlashdata('fail', 'Update Gagal!');
        //         }
        //     } else {
        //         $data['validasi'] = $this->validator;
        //     }
        // }
        return view('dashboard/prodi/profileNama', $data);
    }


}
