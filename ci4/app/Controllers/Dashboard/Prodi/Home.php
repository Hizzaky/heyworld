<?php

namespace App\Controllers\Dashboard\Prodi;

use App\Controllers\BaseController;
use App\Models\Dashboard\Prodi\Prodi;

class Home extends BaseController
{
    public function index(): string
    {
        // $sesi=session();
        $model=new Prodi();

        $data=$model->arData();

        return view('dashboard/prodi/home',$data);
    }

    
}
