<?php

namespace App\Controllers\Login;
use App\Controllers\BaseController;
use App\Models\Login\Login;
class Home extends BaseController
{
    public function index()
    {
        $dataSesi=session();
        $sesi=$dataSesi->get('login');
        if(isset($sesi['jenis_user'])){
            
        // return redirect()->to(base_url($ret));
            return redirect()->to(ucfirst($sesi['jenis_user']));
        }

        if (isset($_GET['login'])) {
            $sesi = session();
            if ($_GET['login'] == 'dosen') {
                $sesi->set('jenis_user', 'dosen');
            }
            if ($_GET['login'] == 'prodi') {
                $sesi->set('jenis_user', 'prodi');
            }
            if ($_GET['login'] == 'fakultas') {
                $sesi->set('jenis_user', 'fakultas');
            }
            $ret = '/Login/' . $_GET['login'];
        } else {
            $ret = '/';
        }
        return redirect()->to(base_url($ret));
    }
    public function dosen()
    {
        $model = new Login;

        helper(['form']);

        $sesi = session();

        $jenis_user = ucfirst($sesi->get('jenis_user'));
        $data = $model->arData($jenis_user);

        if ($this->request->getMethod() == 'post') {

            $rules = $model->ruleDosen();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;
                $login = $model->cekAkun($_POST, $jenis_user);
                if ($login['login'] == '1') {
                    return redirect()->to('Dashboard/Dosen');
                } else {
                    $data['fail'] = 'Username/Password tidak valid!';
                }
            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('login/dosen', $data);
    }
    public function prodi()
    {
        $model = new Login;

        helper(['form']);

        $sesi = session();

        $jenis_user = ucfirst($sesi->get('jenis_user'));
        $data = $model->arData($jenis_user);
        $data['program_studi'] = $model->getData($jenis_user);
        
        if ($this->request->getMethod() == 'post') {

            $rules = $model->ruleProdi();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;
                $login = $model->cekAkun($_POST, $jenis_user);
                if ($login['login'] == '1') {
                    return redirect()->to('Dashboard/Prodi');
                } else {
                    $data['fail'] = 'Username/Password tidak valid!';
                }
                // $this->pre($_POST);
            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('login/prodi', $data);
    }
    public function fakultas()
    {
        $model = new Login;

        helper(['form']);

        $sesi = session();

        $jenis_user = ucfirst($sesi->get('jenis_user'));
        $data = $model->arData($jenis_user);
        $data['fakultas']=$model->getData($jenis_user);


        if ($this->request->getMethod() == 'post') {

            $rules = $model->ruleFakultas();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;
                $login = $model->cekAkun($_POST, $jenis_user);
                if ($login['login'] == '1') {
                    return redirect()->to('Dashboard/Fakultas');
                } else {
                    $data['fail'] = 'Username/Password tidak valid!';
                }
            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('login/fakultas', $data);
    }
}
