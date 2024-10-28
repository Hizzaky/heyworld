<?php

namespace App\Models\Dashboard\Prodi;

use CodeIgniter\Model;
use App\Models\Dashboard\Prodi\Table\TaxbloomModel;
use App\Models\CustomModel;

class Prodi extends Model
{
    public function title()
    {
        $data = [
            'meta' => 'Welcome Prodi UMMAT',
            'header' => 'Homepage Prodi'
        ];
        return $data;
    }
    public function dataExplode($data)
    {
        // $count=count($data);
        $new = [];
        $x = 2;
        foreach ($data as $val) {
            $new[$x] = explode(" ", $val);
            $x++;
        }
        return $new;
    }
    public function reData($data)
    {
        $modelTbl = new TaxbloomModel();
        $new = [];
        // $key = array_keys($data);
        $count = count($data);
        $count += 2;
        $c = 0;

        for ($i = 2; $i < $count; $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {

                // $new[$c] = [
                $new = [
                    'kode' => 'C' . $i,
                    'katalog' => str_replace('-', ' ', $data[$i][$j])
                ];
                // $c++;
                // $modelTbl->save($new);
            }
        }
        echo 'cek';
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


            if (empty($dataC2[$i]['katalog'])) {
                $dataC2[$i]['katalog'] = '';
            } else {
                $data[$count]['c2'] = $dataC2[$i]['katalog'];
            }
            if (empty($dataC3[$i]['katalog'])) {
                $dataC3[$i]['katalog'] = '';
            } else {
                $data[$count]['c3'] = $dataC3[$i]['katalog'];
            }
            if (empty($dataC4[$i]['katalog'])) {
                $dataC4[$i]['katalog'] = '';
            } else {
                $data[$count]['c4'] = $dataC4[$i]['katalog'] . '
                <select>
                <option>tes</option>
                <option>tes</option>
                </select>
                ';
            }
            if (empty($dataC5[$i]['katalog'])) {
                $dataC5[$i]['katalog'] = '';
            } else {
                $data[$count]['c5'] = '
                    <button  data-toggle="dropdown" class="btn dropdown nav-link dropdown-toggle nav-link-lg nav-link-user>
                            <div class="d-sm-none d-lg-inline-block">' . $dataC5[$i]['katalog'] . '</div>
                        
                        <div class="dropdown-menu ">
                            <div class="dropdown-divider"></div>
                            <a href="' . $dataC6[$i]['taxbloom_id'] . '" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    <a href="' . $dataC6[$i]['taxbloom_id'] . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            
                        </div>
                    </button>
                '; 
            }
            if (empty($dataC6[$i]['katalog'])) {
                $dataC6[$i]['katalog'] = '';
            } else {
                $data[$count]['c6'] = $dataC6[$i]['katalog'] . '<br>
                    <a href="' . $dataC6[$i]['taxbloom_id'] . '" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    <a href="' . $dataC6[$i]['taxbloom_id'] . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
            }





            $no++;
            $count++;
        }

        return $data;
    }
}