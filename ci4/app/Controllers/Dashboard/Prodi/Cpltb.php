<?php

namespace App\Controllers\Dashboard\Prodi;

use App\Controllers\BaseController;
use App\Models\Dashboard\Prodi\Prodi;
use App\Models\Dashboard\Prodi\Table\TaxbloomModel;


class cpltb extends BaseController
{
    public function index()
    {
        $sesi = session();
        $ver = $sesi->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Prodi') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }

        // $model = new Prodi();
        // $data = $this->arData($model->title(), $sesi->get('login'));

        // return view('dashboard/prodi/home', $data);

        return redirect('prodi-taxbloom');

    }
    public function capaian()
    {
        $model = new Prodi();
        $sesi = session();
        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['side'] = '1';

        return view('dashboard/prodi/capaian', $data);

    }
    public function taxbloom()
    {
        $model = new Prodi();
        $modelTbl = new TaxbloomModel();
        $sesi = session();
        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['side'] = '2';

        // if(request()->getMethod()=='post'){
        //     $rule=$model->rules();
        // }




        return view('dashboard/prodi/taxbloom', $data);

    }

    public function save_taxbloom()
    {
        $model = new Prodi();
        if (request()->getMethod() == 'post') {
            // $this->pre($_POST);
            $new = $model->dataExplode($_POST);
            // $this->pre($new);

            $reData = $this->reData($new);
            // $this->pre($reData);
        } else {
            $sesi = session();
            $sesi->setTempdata('fail', 'Tidak ada data', 2);
            return redirect('prodi-taxbloom');
        }
    }
    public function reData($data)
    {
        $new = array();
        // $key = array_keys($data);
        // $count = count($data);
        $c = 0;
        
        // foreach ($key as $x) {
        //     $d=0;
        //     foreach ($data as $val) {
        //         $new[$c] = [
        //             'kode' => 'C'.$x,
        //             'katalog'=>$val
        //         ];
        //     }
        //     $c++;
        // } 

        foreach($data as $key=>$val)
        {
            // $kode=array_keys($data);
            $new[$c]=[ 
                'kode'=>'C'.$key,
                'katalog'=>$val
            ];
            $c++;
        }
        return $new;
    }




}
