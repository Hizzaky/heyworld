<?php

namespace App\Controllers\Login;
use App\Controllers\BaseController;
use App\Models\Login\Login;
class Home extends BaseController
{
    public function index()
    {
        if (isset($_GET['login'])) {
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

        $kategori = ucfirst($sesi->get('jenis_login'));
        $data = $model->arData($kategori);

        if ($this->request->getMethod() == 'post') {

            $rules = $model->rule();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;
                $login = $model->cekAkun($_POST, $kategori);
                if ($login['login'] == '1') {
                    return redirect()->to('Dosen');
                } else {
                    $data['fail'] = 'Username/Password tidak valid!';
                }
            } else {
                $data['validasi'] = $this->validator;
            }
        }
        return view('login/login', $data);
    }
    public function prodi()
    {
        return 'halaman login prodi';
    }
    public function fakultas()
    {
        return 'halaman login fakultas';
    }


}
