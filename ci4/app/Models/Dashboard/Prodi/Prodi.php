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
        $modelTbl=new TaxbloomModel();
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
    public function dataTaxbloom(){
        $db=db_connect();
        $model=new CustomModel($db);
        $dataC2=$model->where1('t_taxbloom', 'kode', 'C2');
        $dataC3=$model->where1('t_taxbloom', 'kode', 'C3');
        $dataC4=$model->where1('t_taxbloom', 'kode', 'C4');
        $dataC5=$model->where1('t_taxbloom', 'kode', 'C5');
        $dataC6=$model->where1('t_taxbloom', 'kode', 'C6');

        $dataC2=array_push($dataC2,$dataC3);
        $dataC2=array_push($dataC2,$dataC4);
        $dataC2=array_push($dataC2,$dataC5);
        $dataC2=array_push($dataC2,$dataC6);

        return $dataC2;
    }
}