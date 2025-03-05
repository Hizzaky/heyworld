<?php

namespace App\Controllers;

class Tes extends BaseController
{
    public function index()
    {

        $title = [
            'meta_title' => 'SIM UMMAT',
            'header_title' => 'Penguasaan Pengetahuan',
            'sub_title' => 'Sub Penguasaan Pengetahuan',
            'sidePp' => 'active',
            'menuPpAdd' => 'active'
        ];

        $data = $this->arData($title, session()->get('login'));
        $data['login'] = session()->get('login');
        $data['input'] = '
            <input class="form-control" type="text name="input" value=""><br>
            <input class="form-control" type="text name="input2" value=""><br>
            <input class="form-control" type="text name="input3" value=""><hr>
            <input class="form-control" type="submit" name="input3" value="Button"><br>
        ';

        $sesi = session();
        $ver = $sesi->get('login');

        helper('form');
        $model = new ProfileModel();
        $modelTbl = new NamaModel();

        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['login'] = $sesi->get('login');
        $data['side'] = '1';
        $data['konten'] = 'Nama';

        if (request()->getMethod() == 'post') {
            
            echo 'sukses';
        }else{
            echo 'fail';
        }

        // return view('tes/modal',$data); 
        echo view('tes/bolb', $data);
    }

    public function get()
    {
        $id = $_GET['id'];

        echo $id;
    }
}