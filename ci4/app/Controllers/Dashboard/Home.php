<?php

namespace App\Controllers\Dashboard\Dosen;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        $dataSesi=session();

        $sesi=$dataSesi->get('login');
        $ret=ucfirst($sesi['jenis_login']);

        return view($ret);
    }
}
