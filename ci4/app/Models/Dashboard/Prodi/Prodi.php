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


        $x=array(
            count($dataC2),
            count($dataC3),
            count($dataC4),
            count($dataC5),
            count($dataC6)
        );

        // $x=max($cek);

        
        $data=[];
        $count=count($data);
        $no=1;
        for($i=0;$i<max($x);$i++)
        {
            // $data[$count]['taxbloom_id']=$dataC3[$i]['taxbloom_id'];
            // $data[$count]['kode']=$dataC3[$i]['kode'];
            // $data[$count]['katalog']=$dataC3[$i]['katalog'];
            // $data[$count]['created_at']=$dataC3[$i]['created_at'];
            // $data[$count]['updated_at']=$dataC3[$i]['updated_at'];

            
            if(empty($dataC2[$i]['katalog']))
            {
                $dataC2[$i]['katalog']='';
            }
            if(empty($dataC3[$i]['katalog']))
            {
                $dataC3[$i]['katalog']='';
            }
            if(empty($dataC4[$i]['katalog']))
            {
                $dataC4[$i]['katalog']='';
            }
            if(empty($dataC5[$i]['katalog']))
            {
                $dataC5[$i]['katalog']='';
            }
            if(empty($dataC6[$i]['katalog']))
            {
                $dataC6[$i]['katalog']='';
            }
            
            $data[$count]['no']=$no;
            $data[$count]['c2']=$dataC2[$i]['katalog'];
            $data[$count]['c3']=$dataC3[$i]['katalog'];
            $data[$count]['c4']=$dataC4[$i]['katalog'];
            $data[$count]['c5']=$dataC5[$i]['katalog'];
            $data[$count]['c6']=$dataC6[$i]['katalog'];

            $no++;
            $count++;
        }

        return $data;
    }
}