<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->setDefaultNamespace("app\Controllers");
// $routes->setDefaultController("Home");
// $routes->setDefaultMethod("index");
// $routes->setTranslateURIDashes(false);
// $routes->set404Override();
$routes->setAutoRoute(true);






// $routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');
$routes->add('homepage', 'Homepage\Home::index'); 

// $routes->add('dosen', 'Login\Login::dosen');
// $routes->add('prodi', 'Login::prodi');
// $routes->add('fakultas', 'Login::fakultas');
// $routes->add('login', 'Home::login');



// $routes->get('/sukses', 'Login\Login::sukses');

$routes->group('Login', function ($routes) {
    $routes->add('/', 'Login\Home::index');
    $routes->add('dosen', 'Login\Home::dosen');
    $routes->add('prodi', 'Login\Home::prodi');
    $routes->add('fakultas', 'Login\Home::fakultas');
    // $routes->add('sukses','Login\Home::sukses',['as'=>'sukses']);
    $routes->add('sukses/(:any)/(:any)/(:any)', 'Login\Home::sukses/$1/$2/$3');
});

$routes->group('Daftar', function ($routes) {
    $routes->add('/', 'Daftar\Home::index');
    $routes->add('dosen', 'Daftar\Home::dosen');
    $routes->add('prodi', 'Daftar\Home::prodi');
    $routes->add('fakultas', 'Daftar\Home::fakultas');

});

$routes->post('logUserOut',function(){
    $sesi=session();
    $data=$sesi->get('login');
    $dir='/Login?login='.lcfirst($data['jenis_user']);
    session()->destroy();
    // $routes->get('/', 'Home::index');
    return redirect()->to($dir);
});

// $routes->group('Dashboard', function ($routes) {
//     $routes->add('/', 'Dashboard\Home::index'); 
    // $routes->add('Profile', 'Dashboard\Fakultas\Profile::index'); 
    // $routes->add('update_nama', 'Dashboard\Fakultas\Profile::update_nama',['as'=>'update-nama']);
    // $routes->add('update_password', 'Dashboard\Fakultas\Profile::update_password',['as'=>'update-password']);
// });
 
  

$routes->group('Fakultas', function ($routes) {
    $routes->add('/', 'Dashboard\Fakultas\Home::index');
    $routes->add('Profile', 'Dashboard\Fakultas\Profile::index'); 
    $routes->add('update_nama', 'Dashboard\Fakultas\Profile::update_nama', ['as' => 'fakultas-update-nama']);
    $routes->add('update_password', 'Dashboard\Fakultas\Profile::update_password',['as'=>'fakultas-update-password']);
    $routes->add('capaian', 'Dashboard\Fakultas\Cpltb::capaian',['as'=>'fakultas-capaian']);
    $routes->add('taxbloom', 'Dashboard\Fakultas\Cpltb::taxbloom',['as'=>'fakultas-taxbloom']);
    $routes->add('save_taxbloom', 'Dashboard\Fakultas\Cpltb::save_taxbloom',['as'=>'fakultas-save-taxbloom']);
});

$routes->group('Prodi', function ($routes) { 
    $routes->add('/', 'Dashboard\Prodi\Home::index');
    $routes->add('Profile', 'Dashboard\Prodi\Profile::index');  
    $routes->add('update_nama', 'Dashboard\Prodi\Profile::update_nama', ['as' => 'prodi-update-nama']); 
    $routes->add('update_password', 'Dashboard\Prodi\Profile::update_password',['as'=>'prodi-update-password']);

});