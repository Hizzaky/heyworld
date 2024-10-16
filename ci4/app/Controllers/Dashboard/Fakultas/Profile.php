<?php

namespace App\Controllers\Dashboard\Fakultas;

use App\Controllers\BaseController;
use App\Models\Dashboard\Fakultas\ProfileModel;
use App\Models\Dashboard\Fakultas\Table\NamaModel;
use App\Models\Dashboard\Fakultas\Table\PassModel;

class Profile extends BaseController
{
    public function index()
    {
        // helper('form');
        $sesi = session();
        // $model = new ProfileModel();

        // $data = $this->arData($model->title(), $sesi->get('login'));
        // $data['login'] = $sesi->get('login');
        // $data['side']='1';

        // return view('dashboard/fakultas/profile', $data);

        $data = $sesi->get('login');
        if (isset($data['jenis_user'])) {
            if ($data['jenis_user'] != 'Fakultas') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }

        return redirect('update-nama');
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

        // $this->pre($data);
        if (request()->getMethod() == 'post') {
            $rules = $model->rules();

            if ($this->validate($rules)) {
                $getData = $modelTbl->find($data['login']['user_id']);
                // $this->pre($getData);
                $_POST['fakultas_id'] = $data['login']['user_id'];
                $modelTbl->save($_POST);

                if ($modelTbl) {
                    $sesi->setFlashdata('sukses', 'Update Berhasil!');
                    $getData = $modelTbl->find($data['login']['user_id']);

                    $dataUser = $this->userData($getData, $data['jenis_user']);
                    $sesi->set('login', $dataUser);
                    $data['login'] = $sesi->get('login');
                } else {
                    $sesi->setFlashdata('fail', 'Update Gagal!');
                }
                // $this->pre($sesi->get('login'));
                // $this->pre($data);
            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('dashboard/fakultas/profileNama', $data);
    }
    public function update_password()
    {
        helper('form');
        $sesi = session();
        $model = new ProfileModel();
        $modelTbl = new PassModel();

        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['login'] = $sesi->get('login');
        $data['side'] = '2';

        // $this->pre($data);
        if (request()->getMethod() == 'post') {
            $rules = $model->passRules();
            // $this->pre($_POST);
            if ($this->validate($rules)) {
                $getData = $modelTbl->find($data['login']['user_id']);
                
                if (password_verify($_POST['oldPassword'], $getData['password'])) {

                    $dataTbl = [
                        'fakultas_id' => $getData['fakultas_id'],
                        'password' => $_POST['password']
                    ];

                    $this->pre($dataTbl);
                    
                    $modelTbl->save($dataTbl);

                    if ($modelTbl) {
                        $sesi->setFlashdata('sukses', 'Update Berhasil!');
                        // $sesi->setTempdata('sukses', 'Update Berhasil!',3);
                        $getData = $modelTbl->find($data['login']['user_id']);

                        $dataUser = $this->userData($getData, $data['jenis_user']);
                        $sesi->set('login', $dataUser);
                        $data['login'] = $sesi->get('login');
                    } else {
                        $sesi->setFlashdata('fail', 'Update Gagal!');
                    }
                } else {
                    $sesi->setFlashdata('fail', 'Update Gagal, Password Terakhir Tidak Sesuai!');
                }

            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('dashboard/fakultas/profilePass', $data);
    }




}
