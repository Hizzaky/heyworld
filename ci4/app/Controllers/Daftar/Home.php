<?php

namespace App\Controllers\Daftar;

use App\Controllers\BaseController;
use App\Models\Daftar\Daftar;

class Home extends BaseController
{
    public function index()
    {

        $model = new Daftar();

        $data = $model->arData('');

        return view('daftar/home', $data);


    }
    public function dosen()
    {
        $model = new Daftar();

        helper('form');

        $jenis_user = 'dosen';
        $data = $model->arData($jenis_user);

        if ($this->request->getMethod() == 'post') {

            $rules = $model->rule();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;

                $cek = $model->cekUser('nidn', $_POST['nidn'], $jenis_user);

                if ($cek['cekUser'] == '0') {

                    $reg = $model->register($jenis_user, $_POST);
                    if ($reg == '1') {
                        // sukses
                        // $data['register']='Pendaftaran Berhasil!, Silahkan menunggu proses konfirmasi';
                        $dataSesi = session();
                        $dataSesi->setFlashdata('register', 'Pendaftaran Berhasil!, Silahkan menunggu proses konfirmasi');

                        return redirect()->to('/Login/dosen');
                        
                    } else {
                        // fail
                        $data['fail'] = 'Pendaftaran Gagal!, Silahkan Coba lagi.';
                    }
                } else {
                    $data['fail'] = 'NIDN Sudah Terdaftar!, Silahkan Hubungi Admin.';
                }
            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('daftar/dosen', $data);
    }
    public function prodi()
    {
        $model = new Daftar();

        helper('form');

        $jenis_user = 'prodi';
        $data = $model->arData($jenis_user);

        if ($this->request->getMethod() == 'post') {

            $rules = $model->rule();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;

                $cek = $model->cekUser('nidn', $_POST['nidn'], $jenis_user);

                if ($cek['cekUser'] == '0') {

                    $reg = $model->register($jenis_user, $_POST);
                    if ($reg == '1') {
                        $dataSesi = session();
                        $dataSesi->setFlashdata('register', 'Pendaftaran Berhasil!, Silahkan menunggu proses konfirmasi');

                        return redirect()->to('/Login/prodi');
                        
                    } else {
                        // fail
                        $data['fail'] = 'Pendaftaran Gagal!, Silahkan Coba lagi.';
                    }
                } else {
                    $data['fail'] = 'NIDN Sudah Terdaftar!, Silahkan Hubungi Admin.';
                }
            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('daftar/prodi', $data);
    }
    public function fakultas()
    {
        $model = new Daftar();

        helper('form');

        $jenis_user = 'fakultas';
        $data = $model->arData($jenis_user);

        if ($this->request->getMethod() == 'post') {

            $rules = $model->rule();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;

                $cek = $model->cekUser('nidn', $_POST['nidn'], $jenis_user);

                if ($cek['cekUser'] == '0') {

                    $reg = $model->register($jenis_user, $_POST);
                    if ($reg == '1') {
                        // sukses
                        // $data['register']='Pendaftaran Berhasil!, Silahkan menunggu proses konfirmasi';
                        $dataSesi = session();
                        $dataSesi->setFlashdata('register', 'Pendaftaran Berhasil!, Silahkan menunggu proses konfirmasi');

                        return redirect()->to('/Login/fakultas');
                        
                    } else {
                        // fail
                        $data['fail'] = 'Pendaftaran Gagal!, Silahkan Coba lagi.';
                    }
                } else {
                    $data['fail'] = 'NIDN Sudah Terdaftar!, Silahkan Hubungi Admin.';
                }
            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('daftar/fakultas', $data);
    }

}
