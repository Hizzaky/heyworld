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
        $sesi = session();
        $ver = $sesi->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Fakultas') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        return redirect('update-nama');
    }
    public function update_nama()
    {
        $sesi = session();
        $ver = $sesi->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Fakultas') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }

        helper('form');
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
                    $sesi->setTempdata('sukses', 'Update Berhasil!',2);
                    $getData = $modelTbl->find($data['login']['user_id']);

                    $dataUser = $this->userData($getData, $data['jenis_user']);
                    $sesi->set('login', $dataUser);
                    $data['login'] = $sesi->get('login');
                } else {
                    $sesi->setTempdata('fail', 'Update Gagal!',2);
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
        $sesi = session();
        $ver = $sesi->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Fakultas') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }

        helper('form');
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
                        $sesi->setTempdata('sukses', 'Update Berhasil!',2);
                        // $sesi->setTempdata('sukses', 'Update Berhasil!',3);
                        $getData = $modelTbl->find($data['login']['user_id']);

                        $dataUser = $this->userData($getData, $data['jenis_user']);
                        $sesi->set('login', $dataUser);
                        $data['login'] = $sesi->get('login');
                    } else {
                        $sesi->setTempdata('fail', 'Update Gagal!',2);
                    }
                } else {
                    $sesi->setTempdata('fail', 'Update Gagal, Password Terakhir Tidak Sesuai!',2);
                }

            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('dashboard/fakultas/profilePass', $data);
    }




}
