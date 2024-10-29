<?php

namespace App\Controllers\Dashboard\Prodi;

use App\Controllers\BaseController;
use App\Models\Dashboard\Prodi\Prodi;

class Home extends BaseController
{
    public function index()
    {
        $sesi=session();
        $ver = $sesi->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Prodi') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        $model=new Prodi();
        $data = $this->arData($model->title(), $sesi->get('login'));
        $sidebar=$this->sidebar();
        $data=array_merge($data,$sidebar);

        $this->pre($data);
        // return view('dashboard/prodi/home',$data);
    }

    
}
