<?php

namespace App\Controllers\Dashboard\Fakultas;

use App\Controllers\BaseController;
use App\Models\Dashboard\Fakultas\Fakultas;

class Home extends BaseController
{
    public function index(): string
    {
        $sesi=session();
        $this->pre($sesi->get('login'));
        // $model=new Fakultas();

        // $data=$model->arData();

        // return view('dashboard/fakultas/home',$data);
    }

    
}
