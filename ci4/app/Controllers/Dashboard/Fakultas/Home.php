<?php

namespace App\Controllers\Dashboard\Fakultas;

use App\Controllers\BaseController;
use App\Models\Dashboard\Fakultas\Fakultas;

class Home extends BaseController
{
    public function index()
    {
        $sesi=session();
        $data = $sesi->get('login');
        if (isset($data['jenis_user'])) {
            if ($data['jenis_user'] != 'Fakultas') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        
        $model=new Fakultas();
        $data=$this->arData($model->title(),$sesi->get('login'));

        return view('dashboard/fakultas/home',$data);
    }

    
}
