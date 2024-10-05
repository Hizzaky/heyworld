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
    public function cekUser($data){
        $db = db_connect();
        $customModel = new CustomModel($db);

        return $data['kategori'][0];
        // $kategori=$data['kategori'][0];
        // $field = 'nidn';
        // $data = $data['nidn'];
        // $tbl = 't_' . lcfirst($kategori);
        // $res = $model->where1($tbl, $field, $data); // validasi username password


        // if (count($res) == 0) {
        //     $return['login'] = '0';
        //     return $return;
        // } else {
        //     if (password_verify($password, $res[0]['password'])) {
        //         $return = [
        //             'login' => '1',
        //             'data' => $res
        //         ];
        //         return $return;
        //     } else {
        //         $return['login'] = '0';
        //         return $return;
        //     }
        // }
        
        // return '';
    }
}
