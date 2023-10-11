<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mahasiswa', 'MahasiswaController::index');
$routes->get('/tambah', 'MahasiswaController::create');
$routes->post('/tambah', 'MahasiswaController::store');
$routes->get('/edit', 'MahasiswaController::edit');
$routes->post('/edit', 'MahasiswaController::update');
$routes->get('/hapus', 'MahasiswaController::delete');