<?php

namespace App\Models\Dashboard\Prodi;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    public function title()
    {
        $title = [
            'meta' => 'Profile Prodi UMMAT',
            'header' => 'Profile'
        ];
        return $title;
    }
    public function rules_nama(){
        $rules = [
            'nama_prodi' => [
                'rules' => 'required',
                'label' => 'Nama Prodi',
                'errors' => [
                    'required' => 'Input Nama Prodi dengan benar!'
                ]
            ]
        ];
        return $rules;
    }
    public function rules_pass(){
        $rules = [
            'oldPassword' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Inputkan Password terakhir dengan benar!',
                    'min_length' => 'Password minimal 8 digit!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Inputkan Password baru dengan benar!',
                    'min_length' => 'Password minimal 8 digit!'
                ]
            ],
            'rePassword' => [
                'rules' => 'required|matches[password]',
                'label' => 'Konfirmasi Password',
                'errors' => [
                    'required' => 'Konfirmasi Password tidak sesuai!',
                    'matches' => 'Konfirmasi Password tidak sesuai'
                ]
            ]
        ];
        return $rules;
    }
}