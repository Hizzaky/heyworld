<?php

namespace App\Controllers\Dashboard\Fakultas;

use App\Controllers\BaseController;
use App\Models\Dashboard\Fakultas\ProfileModel;

class Profile extends BaseController
{
    public function index(): string
    {
        // $sesi=session();
        $model = new ProfileModel();

        $data = $model->arData();

        return view('dashboard/fakultas/profile', $data);
    }


}
