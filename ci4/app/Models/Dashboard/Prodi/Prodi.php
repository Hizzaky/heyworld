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
    
}