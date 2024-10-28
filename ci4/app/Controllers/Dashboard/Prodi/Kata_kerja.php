<?php

namespace App\Controllers\Dashboard\Prodi;

use App\Controllers\BaseController;
use App\Models\Dashboard\Prodi\KataKerjaModel;
use App\Models\Dashboard\Prodi\RestoreKataKerjaModel;
use App\Models\Dashboard\Prodi\Table\TaxbloomModel;
use App\Models\Dashboard\Prodi\Table\TaxbloomDeletedModel;
use App\Models\CustomModel;


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
        $table->setHeading(['#', 'C2', 'C3', 'C4', 'C5', 'C6']);

        $data['table'] = $table;

        return view('dashboard/prodi/taxbloom', $data);

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
        $modelTbl = new TaxbloomModel();
        $modelDel = new TaxbloomDeletedModel();

        $data = $this->arData($model->title(), $sesi->get('login'));

        // $data['taxbloom'] = $model->dataTaxbloom();
        $data['taxbloom'] = $modelDel->findAll();

        $table->setTemplate($model->templateTbl());
        // $table->setHeading(['#', 'Kode', 'Kata Kerja', 'Aksi']);
        $table->setHeading(['ID', 'Kode', 'Kata Kerja', 'Tgl Dihapus','aksi']);

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
                $msg='Kata kerja berhasil dihapus!';
            } else {
                $key='failHapusKataKerja';
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

        $modelTbl->save($dataRestore);
        if ($modelTbl) {
            $modelDel->delete($id);
            if ($modelDel) {
                $key = 'suksesRestoreKataKerja';
                $msg='Kata kerja berhasil dikembalikan!';
            } else {
                $key='failRestoreKataKerja';
                $msg = 'Kata kerja gagal dikembalikan!';
            }
        } else {
            $key = 'failRestoreKataKerja';
            $msg = 'Kata kerja gagal dikembalikan!';
        }
        return redirect('prodi-kata-kerja')->with($key, $msg);
    }




    public function save_taxbloom()
    {
        $model = new KataKerjaModel();
        $modelTbl = new TaxbloomModel();

        $db = db_connect();
        $customModel = new customModel($db);
        if (request()->getMethod() == 'post') {
            // $this->pre($_POST);
            $new = $model->dataExplode($_POST);
            // $this->pre($new);

            // $model->reData($new);

            // $modelTbl->save($reData);
            // if($modelTbl)
            // {
            //     echo 'upload sukses';
            // }else{
            //     echo 'upload fail';
            // }
            // $this->pre($reData);

            // $customModel->insertBatch('t_taxbloom',$reData);

            echo 'cek proses';

        } else {
            $sesi = session();
            $sesi->setTempdata('fail', 'Tidak ada data', 2);
            return redirect('prodi-taxbloom');
        }
    }






}
