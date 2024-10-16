<?php

namespace App\Models\Dashboard\Prodi;

use CodeIgniter\Model;

class Prodi extends Model
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