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
    $routes->add('Dosen', 'Login\Home::dosen', ['as' => 'login-Dosen']);
    $routes->add('Prodi', 'Login\Home::prodi', ['as' => 'login-Prodi']);
    $routes->add('Fakultas', 'Login\Home::fakultas', ['as' => 'login-Fakultas']);
    // $routes->add('sukses','Login\Home::sukses',['as'=>'sukses']);
    $routes->add('sukses/(:any)/(:any)/(:any)', 'Login\Home::sukses/$1/$2/$3');
});

$routes->group('Daftar', function ($routes) {
    $routes->add('/', 'Daftar\Home::index');
    $routes->add('Dosen', 'Daftar\Home::dosen');
    $routes->add('Prodi', 'Daftar\Home::prodi');
    $routes->add('Fakultas', 'Daftar\Home::fakultas');

});

$routes->add('logUserOut', function () {
    $sesi = session();
    $data = $sesi->get('login');
    if (isset($data['jenis_user'])) {
        $dir = '/Login?login=' . lcfirst($data['jenis_user']);
    }else{
        $dir='/';
    }
    session()->destroy();
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
    $routes->add('Home', 'Dashboard\Fakultas\Home::index');
    $routes->add('Profile', 'Dashboard\Fakultas\Profile::index');
    $routes->add('Update-nama', 'Dashboard\Fakultas\Profile::update_nama', ['as' => 'fakultas-update-nama']);
    $routes->add('Update-password', 'Dashboard\Fakultas\Profile::update_password', ['as' => 'fakultas-update-password']);

    $routes->add('cek', 'Dashboard\Fakultas\Profile::cek');
});

$routes->group('Prodi', function ($routes) {
    $routes->add('/', 'Dashboard\Prodi\Home::index');
    $routes->add('Home', 'Dashboard\Prodi\Home::index');
    $routes->add('Profile', 'Dashboard\Prodi\Profile::index');
    $routes->add('Update-nama', 'Dashboard\Prodi\Profile::update_nama', ['as' => 'prodi-update-nama']);
    $routes->add('Update-password', 'Dashboard\Prodi\Profile::update_password', ['as' => 'prodi-update-password']);
    
    $routes->add('Kata-kerja', 'Dashboard\Prodi\Kata_kerja::taxbloom', ['as' => 'prodi-kata-kerja']);
    $routes->add('Restore-kata-kerja', 'Dashboard\Prodi\Kata_kerja::restore_taxbloom', ['as' => 'prodi-restore-kata-kerja']);
    $routes->add('Penambahan-kata-kerja', 'Dashboard\Prodi\Kata_kerja::add_taxbloom', ['as' => 'prodi-penambahan-kata-kerja']);

    $routes->add('hapus-index/(:any)', 'Dashboard\Prodi\Kata_kerja::delete_kata_kerja/$1');
    $routes->add('restore-index/(:any)', 'Dashboard\Prodi\Kata_kerja::restore_kata_kerja/$1');
    $routes->add('delete-permanen/(:any)', 'Dashboard\Prodi\Kata_kerja::permanen_kata_kerja/$1');

    // $routes->add('Save-taxbloom', 'Dashboard\Prodi\Kata_kerja::save_taxbloom', ['as' => 'prodi-save-taxbloom']);
    // $routes->add('Taxonomi-bloom', 'Dashboard\Prodi\Kata_kerja::tbl_taxbloom', ['as' => 'prodi-tbl-taxbloom']);

});