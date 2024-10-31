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
            
            return redirect()->to($sesi['jenis_user']);
        }

        if (isset($_GET['login'])) {
            $sesi = session();
            if ($_GET['login'] == 'dosen') {
                $sesi->set('jenis_user', 'Dosen');
            }
            if ($_GET['login'] == 'prodi') {
                $sesi->set('jenis_user', 'Prodi');
            }
            if ($_GET['login'] == 'fakultas') {
                $sesi->set('jenis_user', 'Fakultas');
            }
            // $ret = '/Login/' . $_GET['login'];
            $ret='login-'.$sesi->get('jenis_user');
        } else {
            $ret = '/';
            return redirect()->to(base_url($ret));
        }
        return redirect($ret);
    }

    public function dosen()
    {
        // $sesi = session();
        // $dataSesi = $sesi->get('login');
        // if (isset($dataSesi['user_id'])) {
        //     return redirect()->to('Dashboard');
        // }

        // $model = new Login;
        // helper(['form']);
        // $jenis_user = $sesi->get('jenis_user');
        // $data = $model->arDataLogin($jenis_user);
        // $data['dataTbl'] = $model->getData($jenis_user);

        // if ($this->request->getMethod() == 'post') {

        //     $rules = $model->ruleProdi();

        //     if ($this->validate($rules)) {
        //         $data['post'] = $_POST;
        //         $login = $model->cekAkun($_POST, $jenis_user);
        //         if ($login['login'] == '1') {
        //             return redirect()->to('Dashboard');
        //         } else {
        //             $data['fail'] = 'Username/Password tidak valid!';
        //         }
        //     } else {
        //         $data['validasi'] = $this->validator;
        //     }
        // }
        // return view('login/dosen', $data);
    }
    public function prodi()
    {
        $sesi = session();
        $dataSesi = $sesi->get('login');
        if (isset($dataSesi['user_id'])) {
            return redirect()->to('Dashboard');
        }

        $model = new Login;
        helper(['form']);
        $jenis_user = $sesi->get('jenis_user');
        $data = $model->arDataLogin($jenis_user);
        $data['dataTbl']=$model->getData($jenis_user);

        if ($this->request->getMethod() == 'post') {

            $rules = $model->ruleProdi();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;
                $login = $model->cekAkun($_POST, $jenis_user);
                if ($login['login'] == '1') {
                    return redirect()->to('Dashboard');
                } else {
                    $data['fail'] = 'Username/Password tidak valid!';
                }
            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('login/prodi', $data);
    }
    public function fakultas()
    {
        $sesi = session();
        $dataSesi = $sesi->get('login');
        if (isset($dataSesi['user_id'])) {
            return redirect()->to('Dashboard');
        }

        $model = new Login;
        helper(['form']);
        $jenis_user = $sesi->get('jenis_user');
        $data = $model->arDataLogin($jenis_user);
        $data['dataTbl']=$model->getData($jenis_user);

        if ($this->request->getMethod() == 'post') {

            $rules = $model->ruleFakultas();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;
                $login = $model->cekAkun($_POST, $jenis_user);
                if ($login['login'] == '1') {
                    return redirect()->to('Dashboard');
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
