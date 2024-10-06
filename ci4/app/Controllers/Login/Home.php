<?php

namespace App\Controllers\Login;
use App\Controllers\BaseController;
use App\Models\Login\Login;
class Home extends BaseController
{
    public function index()
    {
        if (isset($_GET)) {
            $sesi = session();
            if ($_GET['login'] == 'dosen') {
                $sesi->set('jenis_login', 'dosen');
            }
            if ($_GET['login'] == 'prodi') {
                $sesi->set('jenis_login', 'prodi');
            }
            if ($_GET['login'] == 'fakultas') {
                $sesi->set('jenis_login', 'fakultas');
            }
            $ret = '/Login/'.$_GET['login'];
        } else {
            $ret = '/';
        }
        return redirect()->to(base_url($ret));

    }
    public function dosen()
    {
        return 'halaman dosen';
    }
    public function prodi()
    {
        return 'halaman prodi';
    }
    public function fakultas()
    {
        return 'halaman fakultas';
    }


}
