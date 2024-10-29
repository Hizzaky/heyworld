<?php

namespace App\Controllers\Dashboard\Prodi;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use App\Models\Dashboard\Prodi\KataKerjaModel;
use App\Models\Dashboard\Prodi\RestoreKataKerjaModel;
use App\Models\Dashboard\Prodi\AddKataKerjaModel;
use App\Models\Dashboard\Prodi\EditKataKerjaModel;
use App\Models\Dashboard\Prodi\Table\TaxbloomModel;
use App\Models\Dashboard\Prodi\Table\TaxbloomDeletedModel;


class Kata_kerja extends BaseController
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
        return redirect('prodi-kata-kerja');
    }

    public function taxbloom()
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
        $table = new \CodeIgniter\View\Table();
        $model = new KataKerjaModel();

        $data = $this->arData($model->title(), $sesi->get('login'));

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

        return view('dashboard/prodi/taxbloom', $data);

    }

    public function add_taxbloom()
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
        $db = db_connect();
        $modelCustom = new CustomModel($db);
        $model = new AddKataKerjaModel();
        $modelTbl = new TaxbloomModel();

        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['kode'] = $modelCustom->selectDist('t_taxbloom', 'kode');
        $data['selected']='';

        // $this->pre($data['kode']);

        if (request()->getMethod() == 'post') {
            
                $dataTbl = [
                    'kode' => $_POST['kode'],
                    'katalog' => $_POST['katalog']
                ];

                $modelTbl->save($dataTbl);

                if ($modelTbl) {
                    $info = 'suksesAddKataKerja';
                    $msg = 'Kata kerja baru berhasil ditambakan!';

                } else {
                    $info = 'failAddKataKerja';
                    $msg = 'Kata kerja baru gagal ditambakan!';
                }
                
        } else {
            $data['validasi'] = $this->validator;
        }

        if (isset($info)) {
            $sesi->setFlashdata($info, $msg);
        }

        return view('dashboard/prodi/add_taxbloom', $data);
    }

    public function edit_taxbloom($id)
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
        $db = db_connect();
        $modelCustom = new CustomModel($db);
        $model = new EditKataKerjaModel();
        $modelTbl = new TaxbloomModel();

        $data = $this->arData($model->title(), $sesi->get('login')); 
        // $this->pre($data);


        $data['kode'] = $modelCustom->selectDist('t_taxbloom', 'kode');
        $dataTbl = $modelTbl->find($id);
        $newDataTbl = [];

        foreach ($dataTbl as $key => $val) {
            if ($key == 'created_at' or $key == 'updated_at')
                continue;
            $newDataTbl[$key] = $val;
        }
        $data['selected'] = $newDataTbl['kode'];
        $data['disabled'] = 'disabled';
        $data['taxbloom'] = $newDataTbl;


        if (request()->getMethod() == 'post') {

            $dataInsert = [
                'taxbloom_id' => $id,
                'katalog' => $_POST['katalog']
            ];

            $modelTbl->save($dataInsert);

            if ($modelTbl) {
                $info = 'suksesHapusKataKerja';
                $msg = 'Update kata kerja berhasil!';

            } else {
                $info = 'failHapusKataKerja';
                $msg = 'Update kata kerja gagal!';
            }
        }

        if (isset($info)) {
            $sesi->setFlashdata($info, $msg);
            return redirect('prodi-kata-kerja');
        }

        return view('dashboard/prodi/add_taxbloom', $data);
    }

    public function restore_taxbloom()
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
        $table = new \CodeIgniter\View\Table();
        $model = new RestoreKataKerjaModel();

        $data = $this->arData($model->title(), $sesi->get('login'));

        $data['taxbloom'] = $model->dataTaxbloom();

        if (count($data['taxbloom']) < 1) {
            $data['alert'] = 'Tidak ada kata kerja yang terhapus / dapat dipulihkan!';
        }

        $table->setTemplate($model->templateTbl());
        $table->setHeading([
            '<strong>#</strong>',
            '<strong>Kode</strong>',
            '<strong>Kata Kerja</strong>',
            '<strong>Waktu Dihapus</strong>',
            '<strong>Aksi</strong>'
        ]);

        $data['table'] = $table;

        return view('dashboard/prodi/restore_taxbloom', $data);

    }
    public function delete_kata_kerja($id)
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
        $modelTbl = new TaxbloomModel();
        $modelDel = new TaxbloomDeletedModel();

        $dataTbl = $modelTbl->find($id);
        $dataInsert['kode'] = $dataTbl['kode'];
        $dataInsert['katalog'] = $dataTbl['katalog'];

        $modelDel->save($dataInsert);
        if ($modelDel) {
            $modelTbl->delete($id);
            if ($modelTbl) {
                $key = 'suksesHapusKataKerja';
                $msg = 'Kata kerja berhasil dihapus!';
            } else {
                $key = 'failHapusKataKerja';
                $msg = 'Kata kerja gagal dihapus!';
            }
        } else {
            $key = 'failHapusKataKerja';
            $msg = 'Kata kerja gagal dihapus!';
        }
        return redirect('prodi-kata-kerja')->with($key, $msg);
    }
    public function restore_kata_kerja($id)
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
        $modelTbl = new TaxbloomModel();
        $modelDel = new TaxbloomDeletedModel();

        $dataDel = $modelDel->find($id);
        $dataRestore['kode'] = $dataDel['kode'];
        $dataRestore['katalog'] = $dataDel['katalog'];

        // $this->pre($id);
        $modelTbl->save($dataRestore);
        if ($modelTbl) {
            $modelDel->delete($id);
            if ($modelDel) {
                $key = 'suksesRestoreKataKerja';
                $msg = 'Kata kerja berhasil dikembalikan!';
            } else {
                $key = 'failRestoreKataKerja';
                $msg = 'Kata kerja gagal dikembalikan!';
            }
        } else {
            $key = 'failRestoreKataKerja';
            $msg = 'Kata kerja gagal dikembalikan!';
        }
        return redirect('prodi-restore-kata-kerja')->with($key, $msg);
    }
    public function edit_kata_kerja($id)
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
        // $modelTbl = new TaxbloomModel();
        // $modelDel = new TaxbloomDeletedModel();

        // $dataDel = $modelDel->find($id);
        // $dataRestore['kode'] = $dataDel['kode'];
        // $dataRestore['katalog'] = $dataDel['katalog'];

        $this->pre($id);
        $this->pre($_POST);
        // $modelTbl->save($dataRestore);
        // if ($modelTbl) {
        //     $modelDel->delete($id);
        //     if ($modelDel) {
        //         $key = 'suksesRestoreKataKerja';
        //         $msg = 'Kata kerja berhasil dikembalikan!';
        //     } else {
        //         $key = 'failRestoreKataKerja';
        //         $msg = 'Kata kerja gagal dikembalikan!';
        //     }
        // } else {
        //     $key = 'failRestoreKataKerja';
        //     $msg = 'Kata kerja gagal dikembalikan!';
        // }
        // return redirect('prodi-restore-kata-kerja')->with($key, $msg);
    }

    public function permanen_kata_kerja($id)
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
        $modelDel = new TaxbloomDeletedModel();

        $modelDel->delete($id);

        if ($modelDel) {
            $key = 'suksesRestoreKataKerja';
            $msg = 'Kata kerja berhasil dihapus permanen!';

        } else {
            $key = 'failRestoreKataKerja';
            $msg = 'Kata kerja gagal dihapus permanen!';
        }
        return redirect('prodi-restore-kata-kerja')->with($key, $msg);
    }






}
