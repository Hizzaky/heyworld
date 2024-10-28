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
    public function templateTbl(){
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
        return $template;
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
                $data[$count]['c4'] = '
<div class="dropdown">
  <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    '.$dataC4[$i]['katalog'].'
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width:10px !important; text-align:center;"> 
    <a class="btn btn-warning btn-sm " href="edit/' . $dataC4[$i]['taxbloom_id'] . '"><i class="fas fa-pencil-alt"></i> </a> | 
    <a class="btn btn-danger btn-sm " href="/delete/' . $dataC4[$i]['taxbloom_id'] . '"><i class="fas fa-trash"></i></a>
  </div>
</div>
                ';
            }
            if (empty($dataC5[$i]['katalog'])) {
                $dataC5[$i]['katalog'] = '';
            } else { 
                $data[$count]['c5'] = '
                    <button  data-toggle="dropdown" class="btn dropdown nav-link dropdown-toggle >
                            <div class="d-sm-none d-lg-inline-block">' . $dataC5[$i]['katalog'] . '</div>
                        
                        <div class="dropdown-menu " >
                            
                            <a href="' . $dataC5[$i]['taxbloom_id'] . '" class="btn btn-warning btn-sm "><i class="fas fa-pencil-alt"></i></a>
                            | <a href="' . $dataC5[$i]['taxbloom_id'] . '" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></a>
                            
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