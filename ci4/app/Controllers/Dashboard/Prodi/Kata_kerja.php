<?php

namespace App\Controllers\Dashboard\Prodi;

use App\Controllers\BaseController;
use App\Models\Dashboard\Prodi\KataKerjaModel;
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

        // $model = new Prodi();
        // $data = $this->arData($model->title(), $sesi->get('login'));

        // return view('dashboard/prodi/home', $data);

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
        $modelTbl = new TaxbloomModel();
        $db = db_connect();
        $modelCustom = new CustomModel($db);
        
        $data = $this->arData($model->title(), $sesi->get('login'));

        $data['taxbloom'] = $model->dataTaxbloom();

        $table->setTemplate($model->templateTbl());

        // $dataTbl = $modelTbl->findAll();
        $table->setHeading(['#', 'C2', 'C3', 'C4', 'C5', 'C6']);
        // $data['dataTbl'] = $dataTbl;
        $data['table'] = $table;

        return view('dashboard/prodi/taxbloom', $data);

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

        $model = new KataKerjaModel();
        $modelTbl = new TaxbloomModel();
        $modelDel = new TaxbloomDeletedModel();
        // $db = db_connect();
        // $modelCustom = new CustomModel($db);
        $data = $this->arData($model->title(), $sesi->get('login'));
        // $data['taxbloom'] = $model->dataTaxbloom();

        $dataTbl=$modelTbl->find($id);
        $dataInsert['kode']=$dataTbl['kode'];
        $dataInsert['katalog']=$dataTbl['katalog'];

        $modelDel->save($dataInsert);
        if($modelDel){
            echo 'sukses';
        }else{
            echo 'fail';
        }


        $this->pre($dataTbl);
        $this->pre($dataInsert);



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

    public function tbl_taxbloom()
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
        $modelTbl = new TaxbloomModel();
        $db=db_connect();
        $modelCustom = new CustomModel($db);
        $data = $this->arData($model->title(), $sesi->get('login'));

        $data['taxbloom']=$model->dataTaxbloom();


        $template = [
            'table_open' => '<table class="table table-responsive table-striped table-md" border="0" cellpadding="4" cellspacing="0">',

            'thead_open' => '<thead>',
            'thead_close' => '</thead>',

            'heading_row_start' => '<tr>',
            'heading_row_end' => '</tr>',
            'heading_cell_start' => '<th>',
            'heading_cell_end' => '</th>',

            'tfoot_open' => '<tfoot>',
            'tfoot_close' => '</tfoot>',

            'footing_row_start' => '<tr>',
            'footing_row_end' => '</tr>',
            'footing_cell_start' => '<td>',
            'footing_cell_end' => '</td>',

            'tbody_open' => '<tbody>',
            'tbody_close' => '</tbody>',

            'row_start' => '<tr>',
            'row_end' => '</tr>',
            'cell_start' => '<td>',
            'cell_end' => '</td>',

            'row_alt_start' => '<tr>',
            'row_alt_end' => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end' => '</td>',

            'table_close' => '</table>',
        ];

        $table->setTemplate($template);

        // $dataTbl = $modelTbl->findAll();
        $table->setHeading(['#', 'C2', 'C3', 'C4', 'C5', 'C6']);
        // $data['dataTbl'] = $dataTbl;
        $data['table'] = $table;


        return view('dashboard/prodi/taxbloom', $data);

    }





}
