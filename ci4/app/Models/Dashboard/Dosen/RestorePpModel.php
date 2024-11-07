<?php

namespace App\Models\Dashboard\Dosen;

use CodeIgniter\Model;
use App\Models\CustomModel;
use App\Models\Dashboard\Dosen\Table\PpTblDeleteModel;

class RestorePpModel extends Model
{
    public function title()
    {
        $title = [
            'meta_title' => 'SIM UMMAT',
            'header_title' => 'Restore Penguasaan Pengetahuan',
            'sub_title' => '',
            'sidePp' => 'active',
            'menuPpDel' => 'active'
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
    
    public function dataTaxbloom()
    {
        $modelDel = new PpTblDeleteModel();
        $dataTbl = $modelDel->findAll();

        $newData = [];
        $x = 0;
        $no = 1;
        foreach ($dataTbl as $key => $val) {
            $newData[$x] = [
                'no' => $no,
                'taxbloom_id' => $val['taxbloom_id'],
                'blue' => $val['blue'],
                'green' => $val['green'],
                'created_at' => date('d-M-Y', strtotime($val['created_at'])),
                'aksi' => '
                    <button class="btn btn-primary " 
                        data-confirm="Restore Kata Kerja?|Gunakan kembali kata kerja?" 
                        data-confirm-yes="dosenRestoreTaxbloom(' . $val['pp_delete_id'] . ')"
                        ><i class="fas fa-undo"></i>aa</button>
                    <button class="btn btn-danger btn-sm " 
                        data-confirm="Hapus Kata Kerja?|Yakin ingin menghapus kata kerja secara permanen?" 
                        data-confirm-yes="dosenDeleteTaxbloomPermanen(' . $val['pp_delete_id'] . ')"
                        ><i class="fas fa-trash"></i>aa</button>
            '
            ];
            $x++;
            $no++;
        }

        return $newData;
    }
    public function dataPp($id)
    {
        $db = db_connect();
        $model = new CustomModel($db);

        $data = $model->ppJoin($id);

        return $data;

    }
}