<?php

namespace App\Models\Dashboard\Fakultas;

use CodeIgniter\Model;

class Fakultas extends Model
{
    public function title()
    {
        $data = [
            'meta_title' => 'Welcome Fakultas UMMAT',
            'header_title' => 'Homepage Fakultas'
        ];
        return $data;
    } 
    
}