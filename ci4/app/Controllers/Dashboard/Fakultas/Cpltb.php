<?php

namespace App\Controllers\Dashboard\Fakultas;

use App\Controllers\BaseController;
use App\Models\Dashboard\Fakultas\Fakultas;

class cpltb extends BaseController
{
    public function index()
    {
        $sesi = session();
        $ver = $sesi->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Fakultas') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }

        // $model = new Fakultas();
        // $data = $this->arData($model->title(), $sesi->get('login'));

        // return view('dashboard/fakultas/home', $data);

        return redirect('fakultas-taxbloom');

    }
    public function capaian(){
        $model= new Fakultas();
        $sesi=session();
        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['side']='1';

        return view('dashboard/fakultas/capaian', $data);

    }
    public function taxbloom(){
        $model= new Fakultas();
        $sesi=session();
        $data = $this->arData($model->title(), $sesi->get('login')); 
        $data['side']='2';
        $this->pre($_POST);
        // $new=explode(" ",$_POST['c1']);
        $new=$this->dataExplode($_POST);
        $this->pre($new);

        return view('dashboard/fakultas/taxbloom', $data);

    }

    public function dataExplode($data){
        // $count=count($data);
        $new=[];
        foreach($data as $val){
            $data[$val]= explode(" ", $data[$val]);
        }
        return $data;
    }


}
