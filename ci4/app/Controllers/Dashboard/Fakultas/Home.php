<?php

namespace App\Controllers\Dashboard\Fakultas;

use App\Controllers\BaseController;
use App\Models\Dashboard\Fakultas\Fakultas;

class Home extends BaseController
{
    public function index()
    {
        $sesi = session();
        $this->verPage($sesi->get('login'));

        $model = new Fakultas();
        $data = $this->arData($model->title(), $sesi->get('login'));

        return view('dashboard/fakultas/home', $data);
    }

    protected function verPage($data)
    {
        if (isset($data['jenis_user'])) {
            if ($data['jenis_user'] != 'Fakultas') {
                // redirect()->back();
                redirect()->to('prodii');
            }
        } else {
            redirect()->to('/');
        }
    }
}
