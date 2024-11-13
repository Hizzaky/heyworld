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



$routes->group('Login', function ($routes) {
    $routes->add('/', 'Login\Home::index');
    $routes->add('Dosen', 'Login\Home::dosen', ['as' => 'login-Dosen']);
    $routes->add('Prodi', 'Login\Home::prodi', ['as' => 'login-Prodi']);
    $routes->add('Fakultas', 'Login\Home::fakultas', ['as' => 'login-Fakultas']);
    $routes->add('cek', 'Login\Home::cek');
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
    } else {
        $dir = '/';
    }
    session()->destroy();
    return redirect()->to($dir);
});




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
    $routes->add('Perubahan-kata-kerja/(:any)', 'Dashboard\Prodi\Kata_kerja::edit_taxbloom/$1', ['as' => 'prodi-perubahan-kata-kerja']);

    $routes->add('hapus-index/(:any)', 'Dashboard\Prodi\Kata_kerja::delete_kata_kerja/$1');
    $routes->add('restore-index/(:any)', 'Dashboard\Prodi\Kata_kerja::restore_kata_kerja/$1');
    $routes->add('edit-index/(:any)', 'Dashboard\Prodi\Kata_kerja::edit_kata_kerja/$1');
    $routes->add('delete-permanen/(:any)', 'Dashboard\Prodi\Kata_kerja::permanen_kata_kerja/$1');


    $routes->add('Penguasaan-pengetahuan', 'Dashboard\Prodi\Pp::index_pp', ['as' => 'prodi-pp']);
    $routes->add('Penguasaan-pengetahuan-baru', 'Dashboard\Prodi\Pp::add_pp', ['as' => 'prodi-add-pp']);
    $routes->add('Save-pp', 'Dashboard\Prodi\Pp::save_pp', ['as' => 'prodi-save-pp']);
    $routes->add('Edit-pp/(:any)', 'Dashboard\Prodi\Pp::edit_pp/$1', ['as' => 'prodi-edit-pp']);
    $routes->add('hapus-pp/(:any)', 'Dashboard\Prodi\Pp::delete_pp/$1', ['as' => 'prodi-delete-pp']);
    $routes->add('Penguasaan-pengetahuan-terhapus', 'Dashboard\Prodi\Pp::restore_pp', ['as' => 'prodi-restore-pp']);
    $routes->add('restore-pp/(:any)', 'Dashboard\Prodi\Pp::pp_restore/$1');
    $routes->add('hapus-pp-permanen/(:any)', 'Dashboard\Prodi\Pp::permanen_pp/$1', ['as' => 'prodi-permanen-pp']);

    $routes->add('Keterampilan-umum', 'Dashboard\Prodi\Ku::index_ku', ['as' => 'prodi-ku']);
    $routes->add('Keterampilan-umum-baru', 'Dashboard\Prodi\Ku::add_ku', ['as' => 'prodi-add-ku']);
    $routes->add('Save-ku', 'Dashboard\Prodi\Ku::save_ku', ['as' => 'prodi-save-ku']);
    $routes->add('Edit-ku/(:any)', 'Dashboard\Prodi\Ku::edit_ku/$1', ['as' => 'prodi-edit-ku']);
    $routes->add('hapus-ku/(:any)', 'Dashboard\Prodi\Ku::delete_ku/$1', ['as' => 'prodi-delete-ku']);
    $routes->add('Keterampilan-umum-terhapus', 'Dashboard\Prodi\Ku::restore_ku', ['as' => 'prodi-restore-ku']);
    $routes->add('restore-ku/(:any)', 'Dashboard\Prodi\Ku::ku_restore/$1');
    $routes->add('hapus-ku-permanen/(:any)', 'Dashboard\Prodi\Ku::permanen_ku/$1', ['as' => 'prodi-permanen-ku']);

    $routes->add('Keterampilan-khusus', 'Dashboard\Prodi\Kk::index_kk', ['as' => 'prodi-kk']);
    $routes->add('Keterampilan-khusus-baru', 'Dashboard\Prodi\Kk::add_kk', ['as' => 'prodi-add-kk']);
    $routes->add('Save-kk', 'Dashboard\Prodi\Kk::save_kk', ['as' => 'prodi-save-kk']);
    $routes->add('Edit-kk/(:any)', 'Dashboard\Prodi\Kk::edit_kk/$1', ['as' => 'prodi-edit-kk']);
    $routes->add('hapus-kk/(:any)', 'Dashboard\Prodi\Kk::delete_kk/$1', ['as' => 'prodi-delete-kk']);
    $routes->add('Keterampilan-khusus-terhapus', 'Dashboard\Prodi\Kk::restore_kk', ['as' => 'prodi-restore-kk']);
    $routes->add('restore-kk/(:any)', 'Dashboard\Prodi\Kk::kk_restore/$1');
    $routes->add('hapus-kk-permanen/(:any)', 'Dashboard\Prodi\Kk::permanen_kk/$1', ['as' => 'prodi-permanen-kk']);

});


$routes->group('Dosen', function ($routes) {
    $routes->add('/', 'Dashboard\Dosen\Home::index');
    $routes->add('Profile', 'Dashboard\Dosen\Profile::index');
    $routes->add('Update-nama', 'Dashboard\Dosen\Profile::update_nama', ['as' => 'dosen-update-nama']);
    $routes->add('Update-password', 'Dashboard\Dosen\Profile::update_password', ['as' => 'dosen-update-password']);



    
});