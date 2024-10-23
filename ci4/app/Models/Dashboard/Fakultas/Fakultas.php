<?php

namespace App\Models\Dashboard\Fakultas;

use CodeIgniter\Model;

class Fakultas extends Model
{
    public function title()
    {
        $data = [
            'meta' => 'Welcome Fakultas UMMAT',
            'header' => 'Homepage Fakultas'
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
}