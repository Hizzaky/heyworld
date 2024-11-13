<?php

namespace App\Models\Dashboard\Prodi\Ku;

use CodeIgniter\Model;
use App\Models\CustomModel;
use App\Models\Dashboard\Prodi\Table\KuTblDeleteModel;

class RestoreKuModel extends Model
{
    public function title()
    {
        $title = [
            'meta_title' => 'SIM UMMAT',
            'header_title' => 'Restore Keterampilan Umum',
            'sub_title' => '',
            'sukses' => 'suksesRestoreKu',
            'fail' => 'failRestoreKu',
            'sideKu' => 'active',
            'menuKuDel' => 'active'
        ];
        return $title;
    }
    
    public function templateTbl()
    {
        $template = [
            'table_open' => '<table class="table table-striped table-md" border="0" cellpadding="4" cellspacing="0">',

            'thead_open' => '<thead style="background-color:lightblue;white-space:nowrap;">',
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
        $modelDel = new KuTblDeleteModel();
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
                    <div style="white-space:nowrap;">
                        <button class="btn btn-primary " 
                        data-confirm="Restore Kata Kerja?|Gunakan kembali kata kerja?" 
                        data-confirm-yes="prodiRestoreKu(' . $val['ku_delete_id'] . ')"
                        ><i class="fas fa-undo"></i></button>
                        <button class="btn btn-danger btn-sm " 
                        data-confirm="Hapus Kata Kerja?|Yakin ingin menghapus kata kerja secara permanen?" 
                        data-confirm-yes="prodiDeleteKuPermanen(' . $val['ku_delete_id'] . ')"
                        ><i class="fas fa-trash"></i></button>
                    </div>
            '
            ];
            $x++;
            $no++;
        }

        return $newData;
    }
   
}