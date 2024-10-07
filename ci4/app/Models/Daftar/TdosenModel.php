<?php
namespace App\Models\Daftar;

use CodeIgniter\Model;

class TdosenModel extends Model
{
    protected $table = 't_dosen';
    protected $primaryKey = 'dosen_id';

    // protected $useAutoIncrement = true;

    // protected $returnType = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nidn','nama_dosen','username', 'password'];

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
    // protected $beforeUpdate = [];
    // protected $afterUpdate = [];
    // protected $beforeFind = [];
    // protected $afterFind = [];
    // protected $beforeDelete = [];
    // protected $afterDelete = [];











    protected $beforeInsert = ['hashPassword'];
    public function hashPassword(array $data)
    {
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }
}