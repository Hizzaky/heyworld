<?php

namespace App\Controllers\Login;
use App\Controllers\BaseController;
use App\Models\Login\Login;
class Home extends BaseController
{
    public function index()
    {
        // $model=new login();

        // $sesi=session();
        // echo 'ini sesi '.$sesi->get('jenis_login');
        
        
        // $data=$model->dosen(ucfirst($sesi->get('jenis_login')));
        
        
        // return view('login/login', $data);



        // if (isset($_GET)) {
        //     $sesi = session();
        //     if ($_GET['login'] == 'dosen') {
        //         $sesi->set('login', 'dosen');
        //     }
        //     if ($_GET['login'] == 'prodi') {
        //         $sesi->set('login', 'prodi');
        //     }
        //     if ($_GET['login'] == 'fakultas') {
        //         $sesi->set('login', 'fakultas');
        //     }
        //     $ret = '/Login';
        // } else {
        //     $ret = '/';
        // }
        // return redirect()->to(base_url($ret));

    }

    protected function dosen(){
        return 'protected dosen';
    }

    private function fakultas()
    {
        return 'private fakultas';
    }
    

}
