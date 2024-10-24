<?php

namespace App\Models\Dashboard\Prodi\Table;

use CodeIgniter\Model;

class TaxbloomModel extends Model
{
    protected $table = 't_taxbloom';
    protected $primaryKey = 'taxbloom_id';

    // protected $useAutoIncrement = true;

    // protected $returnType = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['kode','katalog'];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    // protected $deletedField = 'deleted_at';

    // Validation
    // protected $validationRules = [];
    // protected $validationMessages = [];
    // protected $skipValidation = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert = [];
    // protected $afterInsert = [];
    // protected $beforeUpdate = ['hashPassword'];
    // protected $afterUpdate = [];
    // protected $beforeFind = [];
    // protected $afterFind = [];
    // protected $beforeDelete = [];
    // protected $afterDelete = [];

}