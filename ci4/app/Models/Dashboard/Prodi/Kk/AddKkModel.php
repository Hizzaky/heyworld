<?php

namespace App\Models\Dashboard\Prodi\Kk;

use CodeIgniter\Model;
use App\Models\CustomModel;


class AddKkModel extends Model
{
    public function title()
    {
        $title = [
            'meta_title' => 'SIM UMMAT',
            'header_title' => 'Keterampilah Khusus',
            'sub_title' => 'Form Penambahan Keterampilah Khusus Baru',
            'sukses' => 'suksesAddKataKerja',
            'fail' => 'failAddKataKerja',
            'modal_title' => 'Kata Kerja Taxonomi Bloom',
            'sideKk' => 'active',
            'menuKkAdd' => 'active'
        ];
        return $title;
    }
    public function templateTbl()
    {
        $template = [
            'table_open' => '<table class="table table-striped table-md" border="0" cellpadding="4" cellspacing="0">',

            'thead_open' => '<thead style="background-color:lightblue;">',
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
    protected function delBtn($data)
    {
        $dir = $data['taxbloom_id'];
        $katalog1 = $data['katalog'];
        $katalog2 = str_replace(' ','_',$data['katalog']);

            $ret="
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