<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $dataSesi=session();

        $sesi=$dataSesi->get('login');
        if(isset($sesi)){

            $dir=$sesi['jenis_user'];
        }else{
            $dir='/';

        }
        return redirect()->to(base_url($dir));
    }
}
