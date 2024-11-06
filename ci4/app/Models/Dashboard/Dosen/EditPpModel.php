<?php

namespace App\Models\Dashboard\Dosen;

use CodeIgniter\Model;
use App\Models\CustomModel;


class EditPpModel extends Model 
{
    public function title()
    {
        $title = [
            'meta_title' => 'SIM UMMAT',
            'header_title' => 'Penguasaan Pengetahuan',
            'sub_title' => 'Form Perubahan Penguasaan Pengetahuan',
            'sidePp' => 'active'
        ];
        return $title;
    }
    
    public function editDataPp($pp_id)
    {
        $db = db_connect();
        $model = new CustomModel($db);

        $data = $model->editPpJoin($pp_id);

        return $data;
    }
    protected function delBtn($data)
    {
        $dir = $data['taxbloom_id'];
        $katalog1 = $data['katalog'];
        $katalog2 = str_replace(' ', '_', $data['katalog']);

        $ret = "
            <div class='dropdown'>
                <button class='btn' type='button' onclick=modalKataKerja('$dir','$katalog2')> $katalog1 </button>
            </div>
        ";
        
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