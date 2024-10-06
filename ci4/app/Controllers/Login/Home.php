<?php

namespace App\Controllers\Login;
use App\Controllers\BaseController;
use App\Models\Login\Login;
class Home extends BaseController
{
    public function index()
    {
        $model=new login();
        // return redirect()->to('../Home');

        $sesi=session();
        echo 'ini sesi '.$sesi->get('jenis_login');
        
        $data=$model->arData('data');
        
        
        
        return '';
    }
    

}
