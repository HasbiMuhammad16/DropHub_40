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

$routes->get('/item', 'Item::index');
$routes->get('/item/create', 'Item::create');
$routes->post('/item/store', 'Item::store');
$routes->get('/item/edit/(:num)', 'Item::edit/$1');
$routes->post('/item/update/(:num)', 'Item::update/$1');
$routes->get('/item/delete/(:num)', 'Item::delete/$1');

$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/about', 'About::index');