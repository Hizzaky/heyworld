<?php

namespace App\Models\Dashboard\Fakultas;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    public function arData()
    {
        $data = [
            'meta_title' => 'Welcome Fakultas UMMAT',
            'header_title' => 'Profil Fakultas ',
            'kategori' => 'Fakultas',
            'konten' => 'Profil'
        ];
        return $data;
    }
}