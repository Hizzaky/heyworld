<?php

namespace App\Controllers\Dashboard\Fakultas;

use App\Controllers\BaseController;
use App\Models\Dashboard\Fakultas\ProfileModel;
use App\Models\Dashboard\Fakultas\Table\NamaModel;

class Profile extends BaseController
{
    public function index(): string
    {
        helper('form');
        $sesi=session();
        $model = new ProfileModel();

        $data = $model->arData();
        $data['login']=$sesi->get('login');
        
        // $this->pre($data);
        
        return view('dashboard/fakultas/profile', $data);
    }
    public function update(){
        helper('form');
        $sesi=session();
        $model = new ProfileModel();
        $modelTbl = new NamaModel();
    
        $data = $model->arData();
        $data['login']=$sesi->get('login');


        // $this->pre($_POST);
        // $this->pre($data);
        
        if(request()->getMethod()=='post'){
            $rules=$model->rules();
            if($this->validate($rules)){
                // $getData=$modelTbl->find($data['login']['user_id']);
                // $this->pre($getData);
                $_POST['fakultas_id']=$data['login']['user_id'];
                $modelTbl->save($_POST);

                if($modelTbl){
                    $sesi->setFlashdata('sukses','Update Nama Fakultas Berhasil!');
                    $sesi->set('nama_user',$_POST['nama_fakultas']);
                    $data['nama_user']=$_POST['nama_fakultas'];
                }else{
                    $sesi->setFlashdata('fail','Update Nama Fakultas Gagal!');
                }
                // $this->pre($_POST);
            }else{
                $data['validasi']=$this->validator;
            }
            
        }


        return view('dashboard/fakultas/profile', $data);
    }


}
