<?php

namespace App\Models\Dashboard\Dosen;

use CodeIgniter\Model;
use App\Models\CustomModel;


class EditPpModel extends Model
{
    public function title()
    {
        $title = [
            'meta_title' => 'SIM UMMAT',
            'header_title' => 'Penguasaan Pengetahuan',
            'sub_title' => 'Form Perubahan Penguasaan Pengetahuan',
            'sidePp' => 'active'
        ];
        return $title;
    }
    
    public function editDataPp($pp_id)
    {
        $db = db_connect();
        $model = new CustomModel($db);

        $data = $model->editPpJoin($pp_id);

        return $data;
    }
}