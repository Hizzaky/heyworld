<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CustomModel
{
    protected $db;
    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;

    }
    function all($table)
    {
        return $this->db->table($table)->get()->getResultArray();
    }
    function where1($table, $field, $data)
    {
        return $this->db->table($table)
            ->where([$field => $data])
            ->get()
            ->getResultArray();
    }
    function where2($table, $field, $data)
    {
        return $this->db->table($table)
            ->where([$field['0'] => $data[0]])
            ->where([$field['1'] => $data[1]])
            ->get()
            ->getResultArray();
    }
    function where3($table, $field, $data)
    {
        return $this->db->table($table)
            ->where([$field[0] => $data[0]])
            ->where([$field[1] => $data[1]])
            ->where([$field[2] => $data[2]])
            ->get()
            ->getResultArray();
    }
    function getPost()
    {
        $builder = $this->db->table('super_user');
        $post = $builder->get()->getResult();
        return $post;
    }

    function insertBatch($tbl,$data)
    {
        $builder = $this->db->table($tbl);
        $builder->insertBatch($data);
        
    }
    
    function selectDist($tbl, $field)
    {
        $builder = $this->db->table($tbl);
        $builder->distinct('kode');
        $data=$builder->get()->getResultArray();

        return $data;
    }
    
}