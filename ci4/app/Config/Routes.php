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
    $routes->add('register', 'Daftar\Home::register');

});

$routes->add('logout',function(){
    session()->destroy();
    // $routes->get('/', 'Home::index');
    return redirect()->to('/');
});

// $routes->group('Dosen', function ($routes) {
//     $routes->add('/', 'Dosen\Home::index');

// });