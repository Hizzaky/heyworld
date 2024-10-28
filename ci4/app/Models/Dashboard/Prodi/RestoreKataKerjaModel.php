<?php

namespace App\Models\Dashboard\Prodi;

use CodeIgniter\Model;
use App\Models\Dashboard\Prodi\Table\TaxbloomModel;
use App\Models\Dashboard\Prodi\Table\TaxbloomDeletedModel;

use App\Models\CustomModel;

class RestoreKataKerjaModel extends Model
{
    public function title()
    {
        $data = [
            'meta' => 'Restore Kata Kerja Taxonomi Bloom',
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
        $modelDel = new TaxbloomDeletedModel();
        $dataTbl=$modelDel->findAll();

        $newData=[];
        $x=0;
        $no=1;
        foreach($dataTbl as $key => $val)
        {
            $newData[$x]=[
                'no'=>$no,
                'kode'=>$val['kode'],
                'katalog'=>$val['katalog'],
                'created_at'=>$val['created_at'],
                'aksi'=>'<button class="btn"><a class="btn btn-danger btn-sm " href="restore-index/' . $val['taxbloom_delete_id'] . '"><i
                                    class="fas fa-trash"></i></a></button>'
            ];
            $x++;
        }



        return $newData;
    }
}