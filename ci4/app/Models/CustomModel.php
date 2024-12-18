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

    function insertBatch($tbl, $data)
    {
        $builder = $this->db->table($tbl);
        $builder->insertBatch($data);

    }

    function selectDist($tbl, $field)
    {
        $builder = $this->db;
        $query = $builder->query('SELECT DISTINCT ' . $field . ' FROM ' . $tbl);
        $data = $query->getResultArray();

        return $data;
    }

    function ppJoin()
    {
        $builder = $this->db->table('t_pp');
        $builder->select('*');
        $builder->join('t_taxbloom', 't_taxbloom.taxbloom_id=t_pp.taxbloom_id');
        // $builder->join('t_dosen', 't_dosen.dosen_id=t_pp.dosen_id');
        // $builder->where('t_pp.dosen_id', $id);
        $builder->orderBy('pp_id', 'DESC');

        $ret = $builder->get()->getResultArray();

        return $ret;
    }
    function editPpJoin($id)
    {
        $builder = $this->db->table('t_pp');
        $builder->select('*');
        $builder->join('t_taxbloom', 't_taxbloom.taxbloom_id=t_pp.taxbloom_id');
        // $builder->join('t_dosen', 't_dosen.dosen_id=t_pp.dosen_id');
        $builder->where('pp_id', $id);

        $ret = $builder->get()->getResultArray();

        return $ret;
    }
    function kuJoin($id)
    {
        $builder = $this->db->table('t_ku');
        $builder->select('*');
        $builder->join('t_taxbloom', 't_taxbloom.taxbloom_id=t_ku.taxbloom_id');
        // $builder->join('t_dosen', 't_dosen.dosen_id=t_ku.dosen_id');
        // $builder->where('t_ku.dosen_id', $id);
        $builder->orderBy('ku_id', 'DESC');

        $ret = $builder->get()->getResultArray();

        return $ret;
    }
    function editKuJoin($id)
    {
        $builder = $this->db->table('t_ku');
        $builder->select('*');
        $builder->join('t_taxbloom', 't_taxbloom.taxbloom_id=t_ku.taxbloom_id');
        // $builder->join('t_dosen', 't_dosen.dosen_id=t_ku.dosen_id');
        $builder->where('ku_id', $id);

        $ret = $builder->get()->getResultArray();

        return $ret;
    }
    function kkJoin($id)
    {
        $builder = $this->db->table('t_kk');
        $builder->select('*');
        $builder->join('t_taxbloom', 't_taxbloom.taxbloom_id=t_kk.taxbloom_id');
        // $builder->join('t_dosen', 't_dosen.dosen_id=t_kk.dosen_id');
        // $builder->where('t_kk.dosen_id', $id);
        $builder->orderBy('kk_id', 'DESC');

        $ret = $builder->get()->getResultArray();

        return $ret;
    }
    function editKkJoin($id)
    {
        $builder = $this->db->table('t_kk');
        $builder->select('*');
        $builder->join('t_taxbloom', 't_taxbloom.taxbloom_id=t_kk.taxbloom_id');
        // $builder->join('t_dosen', 't_dosen.dosen_id=t_kk.dosen_id');
        $builder->where('kk_id', $id);

        $ret = $builder->get()->getResultArray();

        return $ret;
    }

}