<?php

namespace App\Models\Dashboard\Dosen;

use CodeIgniter\Model;

class Dosen extends Model
{
    public function title()
    {
        $data = [
            'meta_title' => 'Welcome Fakultas UMMAT',
            'header_title' => 'Homepage Fakultas',
            'sideDashboard' => 'active',
            'menuDashboard' => 'active'
        ];
        return $data;
    }
}