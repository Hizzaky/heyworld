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
});


$routes->group('Dosen', function ($routes) {
    $routes->add('/', 'Dashboard\Dosen\Home::index');
    $routes->add('Profile', 'Dashboard\Dosen\Profile::index');
    $routes->add('Update-nama', 'Dashboard\Dosen\Profile::update_nama', ['as' => 'dosen-update-nama']);
    $routes->add('Update-password', 'Dashboard\Dosen\Profile::update_password', ['as' => 'dosen-update-password']);

    $routes->add('Penguasaan-pengetahuan', 'Dashboard\Dosen\Pp::index_pp', ['as' => 'dosen-pp']);
    $routes->add('Penguasaan-pengetahuan-baru', 'Dashboard\Dosen\Pp::add_pp', ['as' => 'dosen-add-pp']);
    $routes->add('Save-pp', 'Dashboard\Dosen\Pp::save_pp', ['as' => 'dosen-save-pp']);
    $routes->add('Edit-pp/(:any)', 'Dashboard\Dosen\Pp::edit_pp/$1', ['as' => 'dosen-edit-pp']);
    $routes->add('hapus-pp/(:any)', 'Dashboard\Dosen\Pp::delete_pp/$1', ['as' => 'dosen-delete-pp']);
    $routes->add('Penguasaan-pengetahuan-terhapus', 'Dashboard\Dosen\Pp::restore_pp', ['as' => 'dosen-restore-pp']);
    $routes->add('restore-pp/(:any)', 'Dashboard\Dosen\Pp::pp_restore/$1');
    $routes->add('hapus-pp-permanen/(:any)', 'Dashboard\Dosen\Pp::permanen_pp/$1', ['as' => 'dosen-permanen-pp']);
 
    $routes->add('Keterampilan-umum', 'Dashboard\Dosen\Ku::index_ku', ['as' => 'dosen-ku']);
    $routes->add('Keterampilan-umum-baru', 'Dashboard\Dosen\Ku::add_ku', ['as' => 'dosen-add-ku']);
    $routes->add('Save-ku', 'Dashboard\Dosen\Ku::save_ku', ['as' => 'dosen-save-ku']);
    $routes->add('Edit-ku/(:any)', 'Dashboard\Dosen\Ku::edit_ku/$1', ['as' => 'dosen-edit-ku']);
    $routes->add('hapus-ku/(:any)', 'Dashboard\Dosen\Ku::delete_ku/$1', ['as' => 'dosen-delete-ku']);
    $routes->add('Keterampilan-umum-terhapus', 'Dashboard\Dosen\Ku::restore_ku', ['as' => 'dosen-restore-ku']);
    $routes->add('restore-ku/(:any)', 'Dashboard\Dosen\Ku::ku_restore/$1');
    $routes->add('hapus-ku-permanen/(:any)', 'Dashboard\Dosen\Ku::permanen_ku/$1', ['as' => 'dosen-permanen-ku']);

    $routes->add('Keterampilan-khusus', 'Dashboard\Dosen\Kk::index_kk', ['as' => 'dosen-kk']);
    $routes->add('Keterampilan-khusus-baru', 'Dashboard\Dosen\Kk::add_kk', ['as' => 'dosen-add-kk']);
    $routes->add('Save-kk', 'Dashboard\Dosen\Kk::save_kk', ['as' => 'dosen-save-kk']);
    $routes->add('Edit-kk/(:any)', 'Dashboard\Dosen\Kk::edit_kk/$1', ['as' => 'dosen-edit-kk']);
    $routes->add('hapus-kk/(:any)', 'Dashboard\Dosen\Kk::delete_kk/$1', ['as' => 'dosen-delete-kk']);
    $routes->add('Keterampilan-khusus-terhapus', 'Dashboard\Dosen\Kk::restore_kk', ['as' => 'dosen-restore-kk']);
    $routes->add('restore-kk/(:any)', 'Dashboard\Dosen\Kk::kk_restore/$1');
    $routes->add('hapus-kk-permanen/(:any)', 'Dashboard\Dosen\Kk::permanen_kk/$1', ['as' => 'dosen-permanen-kk']);



    
});