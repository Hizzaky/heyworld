<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;
use App\Models\Dosen\Dosen;

class Home extends BaseController
{
    public function index(): string
    {
        // $sesi=session();
        $model=new Dosen();

        $data=$model->arData();

        // echo $this->pre($sesi->get('login'));

        // $sesiLogin=$sesi->get('login');
        // echo 'NIDN : '.$sesi->get('login')->get('nidn');
        // echo $sesiLogin['nidn'];

        return view('dosen/home',$data);
        // return '';
    }

    
}
