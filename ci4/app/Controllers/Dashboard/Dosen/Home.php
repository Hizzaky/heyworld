<?php

namespace App\Controllers\Dashboard\Dosen;

use App\Controllers\BaseController;
use App\Models\Dashboard\Dosen\Dosen;

class Home extends BaseController
{
    public function index(): string
    {
        // $sesi=session();
        $model=new Dosen();

        $data=$model->arData();

        return view('dashboard/dosen/home',$data);
    }

    
}
