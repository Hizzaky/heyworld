<?php

namespace App\Controllers\Dashboard\Prodi;

use App\Controllers\BaseController;
use App\Models\Dashboard\Prodi\Prodi;
use App\Models\Dashboard\Prodi\Table\KkTblModel;
use App\Models\Dashboard\Prodi\Table\KkTblDeleteModel;
use App\Models\Dashboard\Prodi\Kk\KkModel;
use App\Models\Dashboard\Prodi\Kk\AddKkModel;
use App\Models\Dashboard\Prodi\Kk\EditKkModel; 
use App\Models\Dashboard\Prodi\Kk\RestoreKkModel; 

class Kk extends BaseController
{
    public function index()
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }

        $model = new Dosen();

        $data = $this->arData($model->title(), session()->get('login'));

        return view('dashboard/dosen/home', $data);
    }
    public function index_kk(){
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $model = new KkModel();
        $sesi=session();
        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['login'] = $sesi->get('login');
        // 
        $data['kk'] = $model->dataKk($data['login']['user_id']);

        return view('dashboard/dosen/kk/home', $data);
    }
    public function add_kk()
    {
        $sesi = session();
        $ver = $sesi->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $model = new AddKkModel();

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

        return view('dashboard/dosen/kk/add_kk', $data);
    }
    public function save_kk()
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        
        if (request()->getMethod() == 'post') {
            $modelTbl = new KkTblModel();
            $sesi = $ver;
            $insert = [
                'taxbloom_id' => $_POST['taxbloom_id'],
                'blue' => $_POST['blue'],
                'green' => $_POST['green'],
                'dosen_id' => $sesi['user_id']
            ];
            $modelTbl->save($insert);

            if ($modelTbl) {
                $key = 'suksesAddKk';
                $msg = 'Keterampilah Khusus Baru Berhasil Ditambahkan!';
            } else {
                $key = 'failAddKk';
                $msg = 'Keterampilah Khusus Baru Gagal Ditambahkan!';
            }
        }else{
            return redirect()->back();
        }
        if (isset($key)) {
            session()->setFlashdata($key, $msg);
        }
        return redirect('dosen-kk');
    }
    public function edit_kk($kk_id)
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $model = new EditKkModel();
        $table = new \CodeIgniter\View\Table();

        $data = $this->arData($model->title(), $ver);
        $data['login'] = $ver;
        $data['edit'] = $model->editDataKk($kk_id);


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
            $modelTbl = new KkTblModel();

            $modelTbl->save($_POST);

            if ($modelTbl) {
                $key = 'suksesAddKk';
                $msg = 'Keterampilah Khusus Berhasil Dirubah!';
            } else {
                $key = 'failAddKk';
                $msg = 'Keterampilah Khusus Gagal Dirubah!';
            }
        }
        if (isset($key)) {
            session()->setFlashdata($key, $msg);
            return redirect('dosen-kk');
        }

        return view('dashboard/dosen/kk/edit_kk', $data);
    }
    public function restore_kk()
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $table = new \CodeIgniter\View\Table();
        $model = new RestoreKkModel();

        $data = $this->arData($model->title(), $ver);

        $data['taxbloom'] = $model->dataTaxbloom();

        if (count($data['taxbloom']) < 1) {
            $data['alert'] = 'Tidak ada Keterampilah Khusus yang terhapus / dapat dipulihkan!';
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

        return view('dashboard/dosen/kk/restore_kk', $data);

    }
    // 
    public function delete_kk($id)
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $modelTbl = new KkTblModel();
        $modelDel = new KkTblDeleteModel();

        $dataTbl = $modelTbl->find($id);
        $dataInsert['taxbloom_id'] = $dataTbl['taxbloom_id'];
        $dataInsert['blue'] = $dataTbl['blue'];
        $dataInsert['green'] = $dataTbl['green'];

        $modelDel->save($dataInsert);
        if ($modelDel) {
            $modelTbl->delete($id);
            if ($modelTbl) {
                $key = 'suksesAddKk';
                $msg = 'Keterampilah Khusus berhasil dihapus!';
            } else {
                $key = 'failAddKk';
                $msg = 'Keterampilah Khusus gagal dihapus!';
            }
        } else {
            $key = 'failAddKk';
            $msg = 'Keterampilah Khusus gagal dihapus!';
        }
        return redirect('dosen-kk')->with($key, $msg);
    }
    public function kk_restore($id)
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $modelTbl = new KkTblModel();
        $modelDel = new KkTblDeleteModel();

        $dataDel = $modelDel->find($id);
        $dataRestore['taxbloom_id'] = $dataDel['taxbloom_id'];
        $dataRestore['blue'] = $dataDel['blue'];
        $dataRestore['green'] = $dataDel['green'];
        $dataRestore['dosen_id'] = $ver['user_id'];

        $this->pre($dataRestore);
        $modelTbl->save($dataRestore);
        if ($modelTbl) {
            $modelDel->delete($id);
            if ($modelDel) {
                $key = 'suksesRestoreKk';
                $msg = 'Kata kerja berhasil dikembalikan!';
            } else {
                $key = 'failRestoreKk';
                $msg = 'Kata kerja gagal dikembalikan!';
            }
        } else {
            $key = 'failRestoreKk';
            $msg = 'Kata kerja gagal dikembalikan!';
        }
        return redirect('dosen-restore-kk')->with($key, $msg);
    }
    public function permanen_kk($id)
    {
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
        // 
        $modelDel = new KkTblDeleteModel();

        $modelDel->delete($id);

        if ($modelDel) {
            $key = 'suksesRestoreKk';
            $msg = 'Kata kerja berhasil dihapus permanen!';

        } else {
            $key = 'failRestoreKk';
            $msg = 'Kata kerja gagal dihapus permanen!';
        }
        return redirect('dosen-restore-kk')->with($key, $msg);
    }
}
