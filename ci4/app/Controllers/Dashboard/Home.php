<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $dataSesi=session();

        $sesi=$dataSesi->get('login');
        $dir='Dashboard/'.$sesi['jenis_user'];
        return redirect()->to(base_url($dir));
    }
}
