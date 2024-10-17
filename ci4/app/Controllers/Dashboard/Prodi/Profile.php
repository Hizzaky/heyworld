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
                return redirect()->to('rip');
            }
        } else {
            return redirect()->to('/');
        }

        // return redirect('update-password'); 
        return redirect()->to('Fakultas/update_nama'); 

    }
    public function tes(){
        echo 'tes';
    }
    public function update_nama()
    {
        // helper('form');
        // $sesi = session();
        // $model = new ProfileModel();
        // $modelTbl = new NamaModel();

        // $data = $this->arData($model->title(), $sesi->get('login'));
        // $data['login'] = $sesi->get('login');
        // $data['side'] = '1';

        return view('dashboard/prodi/profileNama');
    }

}
