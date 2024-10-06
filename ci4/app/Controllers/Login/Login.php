<?php

namespace App\Controllers\Login;
use App\Controllers\BaseController;
class Login extends BaseController
{
    public function index()
    {
        if (isset($_GET)) {
            $sesi = session();
            if ($_GET['login'] == 'dosen') {
                $sesi->set('login=dosen');
            }
            if ($_GET['login'] == 'prodi') {
                $sesi->set('login=prodi');
            }
            if ($_GET['login'] == 'fakultas') {
                $sesi->set('login=fakultas');
            }else{
                return redirect()->to('/');
            }
            $ret = '/Login';
            
        } else {
            $ret = '/';
        }

        return redirect()->to($ret);


    }


}
