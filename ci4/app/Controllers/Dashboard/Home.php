<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $dataSesi=session();

        $sesi=$dataSesi->get('login');
        // $ret=ucfirst($sesi['jenis_login']);
        // $dir='/'.$sesi['jenis_user'];
        $dir='fail';
        return redirect()->to(base_url($dir));
    }
}
