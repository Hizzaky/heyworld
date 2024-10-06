<?php
namespace App\Models\Login;

use App\Controllers\BaseController;
use App\Models\CustomModel;
class Login extends BaseController
{

    public function dosen()
    {
        helper(['form']);
        $kategori = 'Dosen';
        $data = $this->arData($kategori);
        // $session=session();
// $session->setFlashdata('loginFail','Username/Password tidak valid!')

        if ($this->request->getMethod() == 'post') {

            $rules = $this->rule();

            if ($this->validate($rules)) {
                $data['post'] = $_POST;
                // return redirect()->to('/Login/sukses/' . $_POST['username'] . '/' . $_POST['password'] . '/' . $kategori);
                $login = $this->cekAkun($_POST, $kategori);
                if ($login['login'] == '1') {
                    return redirect()->to('Dosen');
                } else {
                    // echo 'Login Gagal';
// $data['validasi'] = ['login'=>'Username/Password Tidak Valid!'];
// $data['validasi'] = $this->validator->getErrors();
                    $data['fail'] = 'Username/Password tidak valid!';
                }
            } else {
                $data['validasi'] = $this->validator;
            }
        }


        // $this->cek($_POST);
        return view('login/login', $data);


    }






















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
    protected function rule()
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
    protected function arData($kategori)
    {
        $data = [
            'meta_title' => 'Login ' . $kategori . ' SIM UMMAT',
            'header_title' => 'Silahkan Login Dengan Akun',
            'kategori' => $kategori,
            'menu' => 'login'
        ];
        return $data;
    }
    public function hashPassword($data)
    {
        $password = password_hash($data, PASSWORD_DEFAULT);
        return $password;
    }
    // public function sukses($username,$password,$kategori)
    public function sukses2($post, $kategori)
    {
        $db = db_connect();
        $model = new CustomModel($db);

        $username = $post['username'];
        $password = $post['password'];
        // $password=$post['password'];
// echo '<br>';
// echo $password;
// echo '<br>';
// echo $kategori;



        $field = ['username', 'password'];
        // $data = [$username, $this->hashPassword($password)];
        $data = [$username, $password];
        $tbl = 't_' . lcfirst($kategori);
        $res = $model->where2($tbl, $field, $data); // validasi username password


        if (count($res) > 0) { //verivikasi data login
// $dir=lcfirst($kategori);
            $return['cek'] = '1';
            $return['login'] = $res;
            // return redirect()->to($dir);
            return $return;
        } else {
            $return['cek'] = '0';
            return $return;
            // return redirect()->back();
        }




        // return redirect()->to(base_url('../Home'));
// return redirect()->route('/login/sukses');
// return redirect()->to(base_url('/login/sukses'));
// return redirect()->back();

        // return view('dosen/home', $post);

        //$model->save($data); //command untuk push data ke table
//$var=$model->find($data); //command untuk mengambil data dari table
//$model->delete($data); //command untuk delete data dari table

        // untuk edit, perlu define table_id pada $data dan gunakan $model->save()





    }
    public function cekAkun($post, $kategori)
    {
        $db = db_connect();
        $model = new CustomModel($db);

        $username = $post['username'];
        $password = $post['password'];
        $field = 'username';
        $data = $username;
        $tbl = 't_' . lcfirst($kategori);
        $res = $model->where1($tbl, $field, $data); // validasi username password


        if (count($res) == 0) {
            $return['login'] = '0';
            return $return;
        } else {
            if (password_verify($password, $res[0]['password'])) {
                $return = [
                    'login' => '1',
                    'data' => $res
                ];
                return $return;
            } else {
                $return['login'] = '0';
                return $return;
            }
        }





    }
}