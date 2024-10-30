<?php

namespace App\Controllers\Dashboard\Dosen;

use App\Models\CustomModel;

use App\Controllers\BaseController;
use App\Models\Dashboard\Dosen\Dosen;
use App\Models\Dashboard\Dosen\Table\PpTblModel;
use App\Models\Dashboard\Dosen\PpModel;

class Pp extends BaseController
{
    public function index()
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }

        $model = new Dosen();

        $data = $this->arData($model->title(), session()->get('login'));

        return view('dashboard/dosen/home', $data);
    }
    public function add_pp()
    {
        $sesi = session();
        $ver = $sesi->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $db = db_connect();
        $modelCustom = new CustomModel($db);
        $model = new PpModel();
        $modelTbl = new PpTblModel();

        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['login']=$sesi->get('login');
        // $data['kode'] = $modelCustom->selectDist('t_taxbloom', 'kode');
        $data['selected'] = '';

        $this->pre($data);

        // if (request()->getMethod() == 'post') {

        //     $dataTbl = [
        //         'kode' => $_POST['kode'],
        //         'katalog' => $_POST['katalog']
        //     ];

        //     $modelTbl->save($dataTbl);

        //     if ($modelTbl) {
        //         $info = 'suksesAddKataKerja';
        //         $msg = 'Kata kerja baru berhasil ditambakan!';

        //     } else {
        //         $info = 'failAddKataKerja';
        //         $msg = 'Kata kerja baru gagal ditambakan!';
        //     }

        // } else {
        //     $data['validasi'] = $this->validator;
        // }

        // if (isset($info)) {
        //     $sesi->setFlashdata($info, $msg);
        // }

        // return view('dashboard/dosen/pp/add_pp', $data);
    }

}
