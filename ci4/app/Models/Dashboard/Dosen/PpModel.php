<?php

namespace App\Models\Dashboard\Dosen;

use CodeIgniter\Model;
use App\Models\CustomModel;


class PpModel extends Model
{
    public function title()
    {
        $title = [
            'meta_title' => 'SIM UMMAT',
            'header_title' => 'Penguasaan Pengetahuan',
            'sub_title' => 'Sub Penguasaan Pengetahuan',
            'sidePp' => 'active',
            'menuPpAdd' => 'active'
        ];
        return $title;
    }
    public function rules_nama(){
        $rules = [
            'nama_dosen' => [
                'rules' => 'required',
                'label' => 'Nama Dosen',
                'errors' => [
                    'required' => 'Input Nama Dosen dengan benar!'
                ]
            ]
        ];
        return $rules;
    }
    public function rules_pass(){
        $rules = [
            'oldPassword' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Inputkan Password terakhir dengan benar!',
                    'min_length' => 'Password minimal 8 digit!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Inputkan Password baru dengan benar!',
                    'min_length' => 'Password minimal 8 digit!'
                ]
            ],
            'rePassword' => [
                'rules' => 'required|matches[password]',
                'label' => 'Konfirmasi Password',
                'errors' => [
                    'required' => 'Konfirmasi Password tidak sesuai!',
                    'matches' => 'Konfirmasi Password tidak sesuai'
                ]
            ]
        ];
        return $rules;
    }
    public function templateTbl()
    {
        $template = [
            'table_open' => '<table class="table table-responsive table-striped table-md" border="0" cellpadding="4" cellspacing="0">',

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