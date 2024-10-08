<?php

namespace App\Controllers\Dashboard\Fakultas;

use App\Controllers\BaseController;
use App\Models\Dashboard\Fakultas\ProfileModel;

class Profile extends BaseController
{
    public function index(): string
    {
        helper('form');
        $sesi=session();
        $model = new ProfileModel();

        $data = $model->arData();
        $data['login']=$sesi->get('login');

        $this->pre($data);

        return view('dashboard/fakultas/profile', $data);
    }


}
