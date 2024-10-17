<?php

namespace App\Controllers\Dashboard\Prodi;

use App\Controllers\BaseController;
use App\Models\Dashboard\Prodi\Prodi;

class Home extends BaseController
{
    public function index(): string
    {
        $sesi=session();
        $model=new Prodi();
        
        $data = $this->arData($model->title(), $sesi->get('login'));
        $this->pre($data);

        return view('dashboard/prodi/home',$data);
    }

    
}
