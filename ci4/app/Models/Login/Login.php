<?php
namespace App\Models\Login;

use App\Controllers\BaseController;
use App\Models\CustomModel;
class Login extends BaseController
{





















    public function prodi()
    {
        helper(['form']);
        $data = [
            'meta_title' => 'Login Prodi SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'kategori' => 'Prodi'
        ];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required',
                'password' => 'required|min_length[8]'
            ];
            if ($this->validate($rules)) {
                // return redirect()->to(base_url('/login/sukses?s=prodi'));
// $this->sukses($data);
            } else {
                $data['validasi'] = $this->validator;
            }
        }

        $this->cek($_POST);
        return view('login/login', $data);


    }
    public function fakultas()
    {
        helper(['form']);
        $data = [
            'meta_title' => 'Login Fakultas SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'kategori' => 'Fakultas'
        ];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required',
                'password' => 'required|min_length[8]'
            ];
            if ($this->validate($rules)) {
                // return redirect()->to(base_url('/login/sukses?s=fakultas'));
// $this->sukses($data);
            } else {
                $data['validasi'] = $this->validator;
            }
        }

        $this->cek($_POST);
        return view('login/login', $data);
    }

    //----------------------------------------------------------------------------------------------------------------------------------
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
    public function rule()
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
    public function arData($kategori)
    {
        $data = [
            'meta_title' => 'Login ' . $kategori . ' SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'kategori' => $kategori
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


        if (count($res) == 0) {
            $return['login'] = '0';
            return $return;
        } else {
            if (password_verify($password, $res[0]['password'])) {
                $return['login'] = '1';
                $dataUser=$this->userData($res[0],$jenis_user);

                $sesi->set('login', $dataUser);
                return $return;
            } else {
                $return['login'] = '0';
                return $return;
            }
        }
    }
    protected function userData($data,$jenis_user){
        if($jenis_user=='dosen'){
            $dataUser = [
                'user_id' => $data['dosen_id'],
                'nidn' => $data['nidn'],
                'nama_user' => $data['nama_dosen'],
                'jenis_user' => ucfirst($jenis_user)
            ];
        }
        if($jenis_user=='prodi'){
            $dataUser = [
                'user_id' => $data['prodi_id'],
                'nidn' => $data['nidn'],
                'nama_user' => $data['nama_prodi'],
                'jenis_user' => ucfirst($jenis_user)
            ];
        }
        if($jenis_user=='fakultas'){
            $dataUser = [
                'user_id' => $data['fakultas_id'],
                'nidn' => $data['nidn'],
                'nama_user' => $data['nama_fakultas'],
                'jenis_user' => ucfirst($jenis_user)
            ];
        }
        return $dataUser;
    }
}