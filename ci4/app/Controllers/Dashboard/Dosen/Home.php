<?php

namespace App\Controllers\Dashboard\Dosen;

use App\Controllers\BaseController;
use App\Models\Dashboard\Dosen\Dosen;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new Dosen();

        $data = $this->arData($model->title(), session()->get('login'));
        if($data==0)
        {
            return redirect()->to('logUserOut');
        }

        return view('dashboard/dosen/home', $data);
    }


}
