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
    function all($table){
        return $this->db->table($table)->get()->getResult();
    }
    function where1($table,$field,$data){
        return $this->db->table($table)
                        ->where([$field=>$data])
                        ->get()
                        ->getResultArray();
    }
    function where2($table,$username,$password){
        return $this->db->table($table)
                        ->where(['username'=>$username])
                        ->where(['password'=>$password])
                        ->get()
                        ->getResultArray();
    }
    function where3($table,$data){
        return $this->db->table($table)
                        ->where(['data'=>$data])
                        ->where(['data'=>$data])
                        ->where(['data'=>$data])
                        ->get()
                        ->getResultArray();
    }

    function getPost(){
    $builder=$this->db->table('super_user');
        $post=$builder->get()->getResult();
        return $post;
    }
}