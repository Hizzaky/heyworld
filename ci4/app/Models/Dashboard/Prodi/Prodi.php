<?php

namespace App\Models\Dashboard\Prodi;

use CodeIgniter\Model;

class Prodi extends Model
{
    public function arData()
    {
        $data = [
            'meta_title' => 'Welcome Prodi UMMAT',
            'header_title' => '',
            'kategori' => 'Prodi',
            'konten' => 'login berhasil'
        ];
        return $data;
    }
}