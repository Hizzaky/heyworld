<?php

namespace App\Controllers\Dashboard\Fakultas;

use App\Controllers\BaseController;
use App\Models\Dashboard\Fakultas\Fakultas;
use App\Models\Dashboard\Fakultas\Table\TaxbloomModel;


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
        $modelTbl= new TaxbloomModel();
        $sesi=session();
        $data = $this->arData($model->title(), $sesi->get('login')); 
        $data['side']='2';

        // if(request()->getMethod()=='post'){
        //     $rule=$model->rules();
        // }


        

        return view('dashboard/fakultas/taxbloom', $data);

    }

    public function save_taxbloom(){
        $model = new Fakultas();
        if(request()->getMethod()=='post'){
            $this->pre($_POST);
            $new = $model->dataExplode($_POST);
            $this->pre($new);
            
        }else{
            $sesi=session();
            $sesi->setTempdata('fail','Tidak ada data',2);
            return redirect('fakultas-taxbloom');
        }
    }

    


}
