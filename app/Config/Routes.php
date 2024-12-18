<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('auth', function ($routes) {
    $routes->get('login', 'Auth::index');
    $routes->post('authenticate', 'Auth::authenticate');
    $routes->get('register', 'Auth::register');
    $routes->post('store', 'Auth::store');
    $routes->get('logout', 'Auth::logout');
});

$routes->group('user', function ($routes) {
    $routes->get('/', 'User::index');
    $routes->get('create', 'User::create');
    $routes->post('store', 'User::store');
    $routes->get('edit/(:num)', 'User::edit/$1');
    $routes->post('update/(:num)', 'User::update/$1');
    $routes->get('delete/(:num)', 'User::delete/$1');
});

$routes->group('antrian', function ($routes) {
    $routes->get('/', 'Queue::index');
    $routes->get('create', 'Queue::create');
    $routes->post('store', 'Queue::store');
    $routes->get('edit/(:num)', 'Queue::edit/$1');
    $routes->post('update/(:num)', 'Queue::update/$1');
    $routes->get('delete/(:num)', 'Queue::delete/$1');
});

$routes->group('laporan', function ($routes) {
    $routes->get('/', 'Report::index');
    $routes->post('generatePdf', 'Report::generatePdf');
    $routes->get('generatePdf', 'Report::generatePdf');
});

$routes->get('forbidden', function() {
    return view('forbidden');
});