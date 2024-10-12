<?php

namespace App\Models\Dashboard\Fakultas;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    
    public function arData($x){
        $data = [
            'meta_title' => 'Welcome $x UMMAT',
            'header_title' => 'Profil $x',
            'jenis_user' => '$x'
        ];
        return $data;
    }
    public function title()
    {
        $title = [
            'meta' => 'Profile Fakultas UMMAT',
            'header' => 'Profil UMMAT'
        ];
        return $title;
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