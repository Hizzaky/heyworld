<?php

namespace App\Controllers\Dashboard\Dosen;

use App\Controllers\BaseController;
use App\Models\Dashboard\Dosen\Dosen;
use App\Models\Dashboard\Dosen\Table\KuTblModel;
use App\Models\Dashboard\Dosen\Table\KuTblDeleteModel;
use App\Models\Dashboard\Dosen\Ku\KuModel;
use App\Models\Dashboard\Dosen\Ku\AddKuModel;
use App\Models\Dashboard\Dosen\Ku\EditKuModel; 
use App\Models\Dashboard\Dosen\Ku\RestoreKuModel; 

class Ku extends BaseController
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
    public function index_ku(){
        $ver = session()->get('login');
        if (isset($ver['jenis_user'])) {
            if ($ver['jenis_user'] != 'Dosen') {
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

        return view('dashboard/dosen/ku/home', $data);
    }
    public function add_pp()
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
        $model = new AddPpModel();

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

        return view('dashboard/dosen/pp/add_pp', $data);
    }
    public function save_pp()
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
            $modelTbl = new PpTblModel();
            $sesi = $ver;
            $insert = [
                'taxbloom_id' => $_POST['taxbloom_id'],
                'blue' => $_POST['blue'],
                'green' => $_POST['green'],
                'dosen_id' => $sesi['user_id']
            ];
            //     $rules = $model->();
            //     if ($this->validate($rules)) {
            $modelTbl->save($insert);

            if ($modelTbl) {
                $key = 'suksesAddPp';
                $msg = 'Penguasaan Pengetahuan Baru Berhasil Ditambahkan!';
            } else {
                $key = 'failAddPp';
                $msg = 'Penguasaan Pengetahuan Baru Gagal Ditambahkan!';
            }
            //     }
        }else{
            return redirect()->back();
        }
        if (isset($key)) {
            session()->setFlashdata($key, $msg);
        }
        return redirect('dosen-pp');
    }
    public function edit_pp($pp_id)
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
        $model = new EditKuModel();
        $table = new \CodeIgniter\View\Table();

        $data = $this->arData($model->title(), $ver);
        $data['login'] = $ver;
        $data['edit'] = $model->editDataPp($pp_id);


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
            return redirect('dosen-ku');
        }

        return view('dashboard/dosen/pp/edit_pp', $data);
    }
    public function restore_pp()
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
        $model = new RestorePpModel();

        $data = $this->arData($model->title(), $ver);

        $data['taxbloom'] = $model->dataTaxbloom();

        if (count($data['taxbloom']) < 1) {
            $data['alert'] = 'Tidak ada penguasaan pengetahuan yang terhapus / dapat dipulihkan!';
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

        return view('dashboard/dosen/pp/restore_pp', $data);

    }
    // 
    public function delete_pp($id)
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
        $modelTbl = new PpTblModel();
        $modelDel = new PpTblDeleteModel();

        $dataTbl = $modelTbl->find($id);
        $dataInsert['taxbloom_id'] = $dataTbl['taxbloom_id'];
        $dataInsert['blue'] = $dataTbl['blue'];
        $dataInsert['green'] = $dataTbl['green'];

        $modelDel->save($dataInsert);
        if ($modelDel) {
            $modelTbl->delete($id);
            if ($modelTbl) {
                $key = 'suksesAddPp';
                $msg = 'Penguasaan Pengetahuan berhasil dihapus!';
            } else {
                $key = 'failAddPp';
                $msg = 'Penguasaan Pengetahuan gagal dihapus!';
            }
        } else {
            $key = 'failAddPp';
            $msg = 'Penguasaan Pengetahuan gagal dihapus!';
        }
        return redirect('dosen-pp')->with($key, $msg);
    }
    public function pp_restore($id)
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
        $modelTbl = new PpTblModel();
        $modelDel = new PpTblDeleteModel();

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
                $key = 'suksesRestorePp';
                $msg = 'Kata kerja berhasil dikembalikan!';
            } else {
                $key = 'failRestorePp';
                $msg = 'Kata kerja gagal dikembalikan!';
            }
        } else {
            $key = 'failRestorePp';
            $msg = 'Kata kerja gagal dikembalikan!';
        }
        return redirect('dosen-restore-pp')->with($key, $msg);
    }
    public function permanen_pp($id)
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
        $modelDel = new PpTblDeleteModel();

        $modelDel->delete($id);

        if ($modelDel) {
            $key = 'suksesRestorePp';
            $msg = 'Kata kerja berhasil dihapus permanen!';

        } else {
            $key = 'failRestorePp';
            $msg = 'Kata kerja gagal dihapus permanen!';
        }
        return redirect('dosen-restore-pp')->with($key, $msg);
    }
}
