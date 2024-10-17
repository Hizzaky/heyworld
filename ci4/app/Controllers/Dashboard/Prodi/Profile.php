<?php

namespace App\Controllers\Dashboard\Prodi;

use App\Controllers\BaseController;
use App\Models\Dashboard\Prodi\ProfileModel;
use App\Models\Dashboard\Prodi\Table\NamaModel;
use App\Models\Dashboard\Prodi\Table\PassModel;

class Profile extends BaseController
{
    public function index()
    {
        $sesi = session();
        $data = $sesi->get('login');
        if (isset($data['jenis_user'])) {
            if ($data['jenis_user'] != 'Prodi') {
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
            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('dashboard/prodi/profileNama', $data);
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

        if (request()->getMethod() == 'post') {
            $rules = $model->passRules();
            if ($this->validate($rules)) {
                $getData = $modelTbl->find($data['login']['user_id']);
                
                if (password_verify($_POST['oldPassword'], $getData['password'])) {

                    $dataTbl = [
                        'fakultas_id' => $getData['fakultas_id'],
                        'password' => $_POST['password']
                    ];
                    
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
        return view('dashboard/prodi/profilePass', $data);
    }




}
