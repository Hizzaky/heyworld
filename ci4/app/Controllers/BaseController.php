<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\CustomModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    // protected $pre=$this->pre('a');
    public function pre($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre><hr>';
    }
    public function arData($title, $data)
    {
        $dataAr = [
            'nama_user' => $data['nama_user'],
            'jenis_user' => $data['jenis_user']
        ]; 
        
        $ret=array_merge($title,$dataAr);

        return $ret;
    }
    protected function userData($data, $jenis_user)
    {
        if ($jenis_user == 'Dosen') {
            $dataUser = [
                'user_id' => $data['dosen_id'],
                'nidn' => $data['nidn'],
                'nama_user' => $data['nama_dosen'],
                'jenis_user' => $jenis_user
            ];
        }
        if ($jenis_user == 'Prodi') {
            $dataUser = [
                'user_id' => $data['prodi_id'],
                'username' => $data['username'],
                'nama_user' => $data['nama_prodi'],
                'akreditasi' => $data['akreditasi'],
                'jenjang' => $data['jenjang'],
                'jenis_user' => $jenis_user
            ];
        }
        if ($jenis_user == 'Fakultas') {
            $dataUser = [
                'user_id' => $data['fakultas_id'],
                'nama_user' => $data['nama_fakultas'],
                'jenis_user' => $jenis_user
            ];
        }
        return $dataUser;
    }

    public function sidebar($sidebar){
        $data['sidebar_'.$sidebar] = 'active';
        $data['sidemenu_'.$sidebar] = 'active';
        return $data;
    }
    

}
