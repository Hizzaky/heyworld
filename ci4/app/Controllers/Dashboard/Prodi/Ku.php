<?php

namespace App\Controllers\Dashboard\Prodi;

use App\Controllers\BaseController;
use App\Models\Dashboard\Prodi\Prodi;
use App\Models\Dashboard\Prodi\Table\KuTblModel;
use App\Models\Dashboard\Prodi\Table\KuTblDeleteModel;
use App\Models\Dashboard\Prodi\Ku\KuModel;
use App\Models\Dashboard\Prodi\Ku\AddKuModel;
use App\Models\Dashboard\Prodi\Ku\EditKuModel; 
use App\Models\Dashboard\Prodi\Ku\RestoreKuModel; 

class Ku extends BaseController
{
    public function index()
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Prodi') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }

        $model = new Prodi();

        $data = $this->arData($model->title(), session()->get('login'));

        return view('dashboard/prodi/home', $data);
    }
    public function index_ku(){
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Prodi') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $model = new KuModel();
        $sesi=session();
        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['login'] = $sesi->get('login');
        // 
        $data['ku'] = $model->dataKu($data['login']['user_id']);

        return view('dashboard/prodi/ku/home', $data);
    }
    public function add_ku()
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
        // 
        $model = new AddKuModel();

        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['login'] = $sesi->get('login');
        // 
        $table = new \CodeIgniter\View\Table();

        $data['taxbloom'] = $model->dataTaxbloom();

        $table->setTemplate($model->templateTbl());
        $table->setHeading([
            '<strong>#</strong>',
            '<strong>C2</strong>',
            '<strong>C3</strong>',
            '<strong>C4</strong>',
            '<strong>C5</strong>',
            '<strong>C6</strong>'
        ]);

        $data['table'] = $table;

        return view('dashboard/prodi/ku/add_ku', $data);
    }
    public function save_ku()
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Prodi') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        if (request()->getMethod() == 'post') {
            $modelTbl = new KuTblModel();
            $insert = [
                'taxbloom_id' => $_POST['taxbloom_id'],
                'blue' => $_POST['blue'],
                'green' => $_POST['green']
            ];

            $modelTbl->save($insert);

            if ($modelTbl) {
                $key = 'suksesAddKu';
                $msg = 'Keterampilan Umum Baru Berhasil Ditambahkan!';
            } else {
                $key = 'failAddKu';
                $msg = 'Keterampilan Umum Baru Gagal Ditambahkan!';
            }
        }else{
            return redirect()->back();
        }
        if (isset($key)) {
            session()->setFlashdata($key, $msg);
        }
        return redirect('prodi-ku');
    }
    public function edit_ku($ku_id)
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Prodi') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $model = new EditKuModel();
        $table = new \CodeIgniter\View\Table();

        $data = $this->arData($model->title(), $ver);
        $data['login'] = $ver;
        $data['edit'] = $model->editDataKu($ku_id);

        $data['taxbloom'] = $model->dataTaxbloom();

        $table->setTemplate($model->templateTbl());
        $table->setHeading([
            '<strong>#</strong>',
            '<strong>C2</strong>',
            '<strong>C3</strong>',
            '<strong>C4</strong>',
            '<strong>C5</strong>',
            '<strong>C6</strong>'
        ]);

        $data['table'] = $table;
        
        if (request()->getMethod() == 'post') { 
            unset($_POST['red']);
            $modelTbl = new KuTblModel();

            $modelTbl->save($_POST);

            if ($modelTbl) {
                $key = 'suksesAddKu';
                $msg = 'Keterampilan Umum Berhasil Dirubah!';
            } else {
                $key = 'failAddKu';
                $msg = 'Keterampilan Umum Gagal Dirubah!';
            }
        }
        if (isset($key)) {
            session()->setFlashdata($key, $msg);
            return redirect('prodi-ku');
        }

        return view('dashboard/prodi/ku/edit_ku', $data);
    }
    public function restore_ku()
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Prodi') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $table = new \CodeIgniter\View\Table();
        $model = new RestoreKuModel();

        $data = $this->arData($model->title(), $ver);

        $data['taxbloom'] = $model->dataTaxbloom();

        if (count($data['taxbloom']) < 1) {
            $data['alert'] = 'Tidak ada Keterampilan Umum yang terhapus / dapat dipulihkan!';
        }

        $table->setTemplate($model->templateTbl());
        $table->setHeading([
            '<strong>#</strong>',
            '<strong>ID Taxbloom</strong>',
            '<strong>Kata 1</strong>',
            '<strong>Kata 2</strong>',
            '<strong>Waktu Dihapus</strong>',
            '<strong>Aksi</strong>'
        ]);

        $data['table'] = $table;

        return view('dashboard/prodi/ku/restore_ku', $data);

    }
    // 
    public function delete_ku($id)
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Prodi') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $modelTbl = new KuTblModel();
        $modelDel = new KuTblDeleteModel();

        $dataTbl = $modelTbl->find($id);
        $dataInsert['taxbloom_id'] = $dataTbl['taxbloom_id'];
        $dataInsert['blue'] = $dataTbl['blue'];
        $dataInsert['green'] = $dataTbl['green'];

        $modelDel->save($dataInsert);
        if ($modelDel) {
            $modelTbl->delete($id);
            if ($modelTbl) {
                $key = 'suksesAddKu';
                $msg = 'Keterampilan Umum berhasil dihapus!';
            } else {
                $key = 'failAddKu';
                $msg = 'Keterampilan Umum gagal dihapus!';
            }
        } else {
            $key = 'failAddKu';
            $msg = 'Keterampilan Umum gagal dihapus!';
        }
        return redirect('prodi-ku')->with($key, $msg);
    }
    public function ku_restore($id)
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Prodi') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $modelTbl = new KuTblModel();
        $modelDel = new KuTblDeleteModel();

        $dataDel = $modelDel->find($id);
        $dataRestore['taxbloom_id'] = $dataDel['taxbloom_id'];
        $dataRestore['blue'] = $dataDel['blue'];
        $dataRestore['green'] = $dataDel['green'];

        $modelTbl->save($dataRestore);
        if ($modelTbl) {
            $modelDel->delete($id);
            if ($modelDel) {
                $key = 'suksesRestoreKu';
                $msg = 'Kata kerja berhasil dikembalikan!';
            } else {
                $key = 'failRestoreKu';
                $msg = 'Kata kerja gagal dikembalikan!';
            }
        } else {
            $key = 'failRestoreKu';
            $msg = 'Kata kerja gagal dikembalikan!';
        }
        return redirect('prodi-restore-ku')->with($key, $msg);
    }
    public function permanen_ku($id)
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Prodi') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $modelDel = new KuTblDeleteModel();

        $modelDel->delete($id);

        if ($modelDel) {
            $key = 'suksesRestoreKu';
            $msg = 'Kata kerja berhasil dihapus permanen!';

        } else {
            $key = 'failRestoreKu';
            $msg = 'Kata kerja gagal dihapus permanen!';
        }
        return redirect('prodi-restore-ku')->with($key, $msg);
    }
}
