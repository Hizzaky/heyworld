<?php

namespace App\Models\Dashboard\Fakultas;

use CodeIgniter\Model;

class Fakultas extends Model
{
    public function arData()
    {
        $data = [
            'meta_title' => 'Welcome Fakultas UMMAT',
            'header_title' => '',
            'jenis_user' => 'Fakultas', 
            'konten' => 'login berhasil'
        ];
        return $data;
    }
}