<?php

namespace App\Models\Dashboard\Prodi;

use CodeIgniter\Model;
use App\Models\Dashboard\Prodi\Table\TaxbloomModel;
use App\Models\CustomModel;

class KataKerjaModel extends Model
{
    public function title()
    {
        $data = [
            'meta' => 'Kata Kerja Taxonomi Bloom',
            'header' => 'Kata Kerja Taxonomi Bloom'
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
    public function templateTbl()
    {
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


            if (isset($dataC2[$i]['katalog'])) {
                $data[$count]['c2'] = '
                    <div class="dropdown">
                        <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            ' . $dataC2[$i]['katalog'] . '
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                            style="width:10px !important; text-align:center;">
                            <a class="btn btn-warning btn-sm " href="edit/' . $dataC2[$i]['taxbloom_id'] . '"><i
                                    class="fas fa-pencil-alt"></i> </a> |
                            <a class="btn btn-danger btn-sm " href="hapus-index/' . $dataC2[$i]['taxbloom_id'] . '"><i
                                    class="fas fa-trash"></i></a>
                        </div>
                    </div>
                ';
            } else {
                $data[$count]['c2'] = '';

            }
            if (isset($dataC3[$i]['katalog'])) {
                $data[$count]['c3'] = '
                    <div class="dropdown">
                        <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            ' . $dataC3[$i]['katalog'] . '
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                            style="width:10px !important; text-align:center;">
                            <a class="btn btn-warning btn-sm " href="edit/' . $dataC3[$i]['taxbloom_id'] . '"><i
                                    class="fas fa-pencil-alt"></i> </a> |
                            <a class="btn btn-danger btn-sm " href="hapus-index/' . $dataC3[$i]['taxbloom_id'] . '"><i
                                    class="fas fa-trash"></i></a>
                        </div>
                    </div>
                ';
            } else {
                $data[$count]['c3'] = '';
            }
            if (isset($dataC4[$i]['katalog'])) {
                $data[$count]['c4'] = '
                    <div class="dropdown">
                        <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            ' . $dataC4[$i]['katalog'] . '
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                            style="width:10px !important; text-align:center;">
                            <a class="btn btn-warning btn-sm " href="edit/' . $dataC4[$i]['taxbloom_id'] . '"><i
                                    class="fas fa-pencil-alt"></i> </a> |
                            <a class="btn btn-danger btn-sm " href="hapus-index/' . $dataC4[$i]['taxbloom_id'] . '"><i
                                    class="fas fa-trash"></i></a>
                        </div>
                    </div>
                ';
            } else {
                $data[$count]['c4'] = '';
            }
            if (isset($dataC5[$i]['katalog'])) {
                $data[$count]['c5'] = '
                    <div class="dropdown">
                        <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            ' . $dataC5[$i]['katalog'] . '
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                            style="width:10px !important; text-align:center;">
                            <a class="btn btn-warning btn-sm " href="edit/' . $dataC5[$i]['taxbloom_id'] . '"><i
                                    class="fas fa-pencil-alt"></i> </a> |
                            <a class="btn btn-danger btn-sm " href="hapus-index/' . $dataC5[$i]['taxbloom_id'] . '"><i
                                    class="fas fa-trash"></i></a>
                        </div>
                    </div>
                ';
            } else {
                $data[$count]['c5'] = '';
            }
            if (isset($dataC6[$i]['katalog'])) {
                $data[$count]['c6'] ='
                    <div class="dropdown">
                        <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            ' . $dataC6[$i]['katalog'] . '
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                            style="width:10px !important; text-align:center;">
                            <a class="btn btn-warning btn-sm " href="edit/' . $dataC6[$i]['taxbloom_id'] . '"><i
                                    class="fas fa-pencil-alt"></i> </a> |
                            <a class="btn btn-danger btn-sm " href="hapus-index/' . $dataC6[$i]['taxbloom_id'] . '"><i
                                    class="fas fa-trash"></i></a>
                        </div>
                    </div>
                ';
            } else {
                $data[$count]['c6'] = '';
            }





            $no++;
            $count++;
        }

        return $data;
    }
}