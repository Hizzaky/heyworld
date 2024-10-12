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
}