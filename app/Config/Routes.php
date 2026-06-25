<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->post('/auth/process', 'Auth::process');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/user', 'UserController::index');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/store', 'UserController::store');
$routes->get('/user/delete/(:num)', 'UserController::delete/$1');
$routes->get('/transaction', 'Transaction::index');
$routes->post('/transaction/store', 'Transaction::store');
$routes->get('/transaction/(:num)', 'Transaction::view_details/$1');
$routes->get('/transaction/delete/(:num)', 'Transaction::delete/$1');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/about', 'About::index');