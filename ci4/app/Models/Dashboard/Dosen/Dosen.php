<?php

namespace App\Models\Dashboard\Dosen;

use CodeIgniter\Model;

class Dosen extends Model
{
    public function title()
    {
        $data = [
            'meta_title' => 'Welcome Dosen UMMAT',
            'header_title' => 'Homepage Dosen',
            'sideDashboard' => 'active',
            'menuDashboard' => 'active'
        ];
        return $data;
    }
}