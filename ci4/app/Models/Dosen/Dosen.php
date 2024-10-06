<?php

namespace App\Models\Dosen;

use CodeIgniter\Model;

class Dosen extends Model
{
    public function arData()
    {
        $data = [
            'meta_title' => 'Welcome Dosen UMMAT',
            'header_title' => '',
            'kategori' => 'Dosen',
            'konten' => 'login berhasil'
        ];
        return $data;
    }
}