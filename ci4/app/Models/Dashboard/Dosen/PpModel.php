<?php

namespace App\Models\Dashboard\Dosen;

use CodeIgniter\Model;

class PpModel extends Model
{
    public function title()
    {
        $title = [
            'meta_title' => 'SIM UMMAT',
            'header_title' => 'Penguasaan Pengetahuan',
            'sidePp' => 'active',
            'menuPpAdd' => 'active'
        ];
        return $title;
    }
    public function rules_nama(){
        $rules = [
            'nama_dosen' => [
                'rules' => 'required',
                'label' => 'Nama Dosen',
                'errors' => [
                    'required' => 'Input Nama Dosen dengan benar!'
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