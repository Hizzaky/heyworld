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
    function all(){
        return $this->db->table('super_user')->get()->getResult();
    }
    function where($table,$username,$password){
        return $this->db->table($table)
                        ->where(['username'=>$username])
                        ->where(['password'=>$password])
                        ->get()
                        ->getResult();
    }

    function getPost(){
    $builder=$this->db->table('super_user');
        $post=$builder->get()->getResult();
        return $post;
    }
}