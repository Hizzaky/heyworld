<?php

namespace App\Controllers\Login;
use App\Controllers\BaseController;
use App\Models\Login\Login;
class Home extends BaseController
{
    public function index()
    {
        // return redirect()->to('../Home');

        $sesi=session();
        echo 'index login';
        return $sesi->get('login');





    }
    

}
