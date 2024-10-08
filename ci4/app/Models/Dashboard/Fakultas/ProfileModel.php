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
    public function rules(){
        $rules = [
            'nama_fakultas' => [
                'rules' => 'required',
                'label' => 'Nama Fakultas',
                'errors' => [
                    'required' => 'Input Nama Fakultas dengan benar!'
                ]
            ]
        ];
        return $rules;
    }
}