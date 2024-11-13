<?php

namespace App\Models\Dashboard\Prodi;

use CodeIgniter\Model;
use App\Models\Dashboard\Prodi\Table\TaxbloomModel;
use App\Models\CustomModel;

class EditKataKerjaModel extends Model
{
    public function title()
    {
        $data = [
            'meta_title' => 'Kata Kerja Taxonomi Bloom',
            'sub_title' => 'Edit Kata Kerja',
            'header_title' => 'Perubahan Kata Kerja Taxonomi Bloom'
        ];
        return $data;
    }
    public function rules_katalog(){
        $rules = [
            'katalog' => [
                'rules' => 'required',
                'label' => 'Katalog',
                'errors' => [
                    'required' => 'Input Kata Kerja dengan benar!'
                ]
            ]
        ];
        return $rules;
    }
    
}