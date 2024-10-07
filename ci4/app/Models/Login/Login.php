<?php
namespace App\Models\Login;

use App\Controllers\BaseController;
use App\Models\CustomModel;
class Login extends BaseController
{

    protected function cek($data)
    {
        if ($data) {
            $data['submit'] = $this->cek_Kategori($data['submit']);
        }
    }
    protected function cek_Kategori($data)
    {
        $ar = explode(" ", $data);
        return $ar[2];
    }
    public function ruleDosen()
    {
        $rules = [
            'username' => [
                'rules' => 'required',
                'label' => 'Usename',
                'errors' => [
                    'required' => 'Inputkan Username dengan benar!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Inputkan Password dengan benar!',
                    'min_length' => 'Password minimal 8 digit!'
                ]
            ]
        ];
        return $rules;
    }
    public function ruleProdi()
    {
        $rules = [
            'username' => [
                'rules' => 'required',
                'label' => 'Prodi',
                'errors' => [
                    'required' => 'Pilih Prodi dengan benar!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Inputkan Password dengan benar!',
                    'min_length' => 'Password minimal 8 digit!'
                ]
            ]
        ];
        return $rules;
    }
    public function ruleFakultas()
    {
        $rules = [
            'username' => [
                'rules' => 'required',
                'label' => 'Fakultas',
                'errors' => [
                    'required' => 'Pilih Fakultas dengan benar!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Inputkan Password dengan benar!',
                    'min_length' => 'Password minimal 8 digit!'
                ]
            ]
        ];
        return $rules;
    }
    public function arData($jenis_user)
    {
        $data = [
            'meta_title' => 'Login ' . $jenis_user . ' SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'jenis_user' => $jenis_user
            // 'menu' => 'login'
        ];
        return $data;
    }
    public function hashPassword($data)
    {
        $password = password_hash($data, PASSWORD_DEFAULT);
        return $password;
    }
    public function cekAkun($data, $jenis_user)
    {
        $db = db_connect();

        $model = new CustomModel($db);

        $sesi = session();

        $username = $data['username'];
        $password = $data['password'];
        $field = 'username';
        $value = $username;
        $tbl = 't_' . lcfirst($jenis_user);
        $res = $model->where1($tbl, $field, $value); // validasi username password

        // if (count($res) == 0) {
        //     $return['login'] = '0';
        //     // return $return;
        // } else {
        //     if (password_verify($password, $res[0]['password'])) {
        //         $return['login'] = '1';
        //         $dataUser=$this->userData($res[0],$jenis_user);

        //         $sesi->set('login', $dataUser);
        //         // return $return;
        //     } else {
        //         $return['login'] = '0';
        //     }
        // }
        return $res[0];
    }
    protected function userData($data,$jenis_user){
        if($jenis_user=='Dosen'){
            $dataUser = [
                'user_id' => $data['dosen_id'],
                'nidn' => $data['nidn'],
                'nama_user' => $data['nama_dosen'],
                'jenis_user' => ucfirst($jenis_user)
            ];
        }
        if($jenis_user=='Prodi'){
            $dataUser = [
                'user_id' => $data['prodi_id'],
                'username' => $data['username'],
                'nama_user' => $data['nama_prodi'],
                'akreditasi' => $data['akreditasi'],
                'jenjang' => $data['jenjang'],
                'jenis_user' => ucfirst($jenis_user)
            ];
        }
        if($jenis_user=='Fakultas'){
            $dataUser = [
                'user_id' => $data['fakultas_id'],
                'username' => $data['username'],
                'nama_user' => $data['nama_fakultas'],
                'jenis_user' => ucfirst($jenis_user)
            ];
        }
        return $dataUser;
    }
}