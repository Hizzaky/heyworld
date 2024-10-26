<?php

namespace App\Models\Dashboard\Fakultas;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    public function title()
    {
        $title = [
            'meta' => 'Profile Fakultas UMMAT',
            'header' => 'Profile'
        ];
        return $title;
    }
    public function rules_nama(){
        $rules = [
            'nama_fakultas' => [
                'rules' => 'required|min_length[8]',
                'label' => 'Nama Fakultas',
                'errors' => [
                    'required' => 'Input Nama Fakultas dengan benar!',
                    'min_length' => 'Minimal 8 digit!'
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