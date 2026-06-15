<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// landing page
$routes->get('/', 'Home::landing');
$routes->get('/landing', 'Home::landing');

// login page
$routes->get('/internal', 'Myth\Auth\Controllers\AuthController::login');
$routes->get('/eksternal', 'Myth\Auth\Controllers\AuthController::loginn');
$routes->get('login-internal', 'AuthController::loginInternal');
$routes->get('login-eksternal', 'AuthController::loginEksternal');

// auth routes
$routes->get('login', '\Myth\Auth\Controllers\AuthController::login', ['as' => 'login']);
$routes->post('login', '\Myth\Auth\Controllers\AuthController::attemptLogin');
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::attemptRegister');
$routes->get('regisInternal', 'AuthController::registerInternal');
$routes->post('registerInternal', 'AuthController::attemptRegisterInternal');

$routes->get('logout', '\Myth\Auth\Controllers\AuthController::logout');

// dashboard
$routes->get('/dashboard', 'Gedung::dashboard', ['filter' => 'login']);

// gedung crud
$routes->get('/gedung/tambah', 'Gedung::tambah');
$routes->post('/gedung/simpan', 'Gedung::simpan');
$routes->get('/gedung/ubah/(:num)', 'Gedung::ubah/$1');
$routes->post('/gedung/update/(:num)', 'Gedung::update/$1');
$routes->post('/gedung/(:segment)/(:segment)/hapus/(:num)', 'Gedung::hapus/$1/$2/$3');
$routes->get('/gedung/(:segment)/(:segment)', 'Gedung::index/$1/$2');

// jadwal dan peminjaman
$routes->get('/jadwal', 'Peminjaman::jadwal'); // daftar jadwal
$routes->get('/jadwal/detailjadwal/(:num)', 'Peminjaman::detail/$1');
$routes->get('/peminjaman', 'Peminjaman::index');
$routes->get('/peminjaman/form', 'Peminjaman::form');
$routes->post('/peminjaman/simpan', 'Peminjaman::simpan');
$routes->get('/peminjaman/success/(:num)', 'Peminjaman::success/$1');
$routes->get('/peminjaman/upload', 'Peminjaman::uploadPage');
$routes->post('/peminjaman/uploadBerkas/(:num)', 'Peminjaman::uploadBerkas/$1');
$routes->post('/jadwal/updateStatus/(:num)', 'Peminjaman::updateStatus/$1');
