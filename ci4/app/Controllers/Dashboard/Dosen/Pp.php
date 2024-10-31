<?php

namespace App\Controllers\Dashboard\Dosen;

use App\Models\CustomModel;

use App\Controllers\BaseController;
use App\Models\Dashboard\Dosen\Dosen;
use App\Models\Dashboard\Dosen\Table\PpTblModel;
use App\Models\Dashboard\Dosen\PpModel;

class Pp extends BaseController
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
        $db = db_connect();
        $modelCustom = new CustomModel($db);
        $model = new PpModel();
        $modelTbl = new PpTblModel();

        $data = $this->arData($model->title(), $sesi->get('login'));
        $data['login']=$sesi->get('login');
        // $data['kode'] = $modelCustom->selectDist('t_taxbloom', 'kode');
        $data['selected'] = '';



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



        // $this->pre($data);

        // if (request()->getMethod() == 'post') {

        //     $dataTbl = [
        //         'kode' => $_POST['kode'],
        //         'katalog' => $_POST['katalog']
        //     ];

        //     $modelTbl->save($dataTbl);

        //     if ($modelTbl) {
        //         $info = 'suksesAddKataKerja';
        //         $msg = 'Kata kerja baru berhasil ditambakan!';

        //     } else {
        //         $info = 'failAddKataKerja';
        //         $msg = 'Kata kerja baru gagal ditambakan!';
        //     }

        // } else {
        //     $data['validasi'] = $this->validator;
        // }

        // if (isset($info)) {
        //     $sesi->setFlashdata($info, $msg);
        // }

        return view('dashboard/dosen/pp/add_pp', $data);
    }
    protected function delBtn($data)
    {
        $dir = $data['taxbloom_id'];

        $ret = '
            <div class="dropdown">
                <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    ' . $data['katalog'] . '
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                    style="width:10px !important; text-align:center;">
                    <a class="btn btn-warning btn-sm " href="Perubahan-kata-kerja/' . $data['taxbloom_id'] . '"><i
                            class="fas fa-pencil-alt"></i> </a> |
                    <button class="btn btn-danger btn-sm " 
                        data-confirm="Hapus Kata Kerja?|Yakin ingin menghapus kata kerja ' . $data['katalog'] . '?" 
                        data-confirm-yes="prodiDeleteTaxbloom(' . $dir . ')"
                        ><i class="fas fa-trash"></i></button>
                </div>
            </div>
        ';
        return $ret;
    }
    public function dataTaxbloom()
    {
        $db = db_connect();
        $model = new CustomModel($db);
        $dataC2 = $model->where1('t_taxbloom', 'kode', 'C2');
        $dataC3 = $model->where1('t_taxbloom', 'kode', 'C3');
        $dataC4 = $model->where1('t_taxbloom', 'kode', 'C4');
        $dataC5 = $model->where1('t_taxbloom', 'kode', 'C5');
        $dataC6 = $model->where1('t_taxbloom', 'kode', 'C6');

        $x = array(
            count($dataC2),
            count($dataC3),
            count($dataC4),
            count($dataC5),
            count($dataC6)
        );

        $data = [];
        $count = count($data);
        $no = 1;
        for ($i = 0; $i < max($x); $i++) {

            $data[$count]['no'] = $no;

            if (isset($dataC2[$i]['katalog'])) {
                $data[$count]['c2'] = $this->delBtn($dataC2[$i]);
            } else {
                $data[$count]['c2'] = '';

            }
            if (isset($dataC3[$i]['katalog'])) {
                $data[$count]['c3'] = $this->delBtn($dataC3[$i]);
            } else {
                $data[$count]['c3'] = '';
            }
            if (isset($dataC4[$i]['katalog'])) {
                $data[$count]['c4'] = $this->delBtn($dataC4[$i]);
            } else {
                $data[$count]['c4'] = '';
            }
            if (isset($dataC5[$i]['katalog'])) {
                $data[$count]['c5'] = $this->delBtn($dataC5[$i]);
            } else {
                $data[$count]['c5'] = '';
            }
            if (isset($dataC6[$i]['katalog'])) {
                $data[$count]['c6'] = $this->delBtn($dataC6[$i]);
            } else {
                $data[$count]['c6'] = '';
            }

            $no++;
            $count++;
        }

        return $data;
    }
}
