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

$routes->get('/transaction', 'Transaction::index');
$routes->post('/transaction/store', 'Transaction::store');
$routes->get('/transaction/(:num)', 'Transaction::view_details/$1');
$routes->get('/transaction/delete/(:num)', 'Transaction::delete/$1');

$routes->get('/api/items', 'Api\ItemApi::index');
$routes->post('/api/items', 'Api\ItemApi::create');
$routes->put('/api/items/(:num)', 'Api\ItemApi::update/$1');
$routes->delete('/api/items/(:num)', 'Api\ItemApi::delete/$1');
$routes->get('/api/transactions', 'Api\TransactionApi::index');
$routes->post('/api/transactions', 'Api\TransactionApi::create');
$routes->put('/api/transactions/(:num)', 'Api\TransactionApi::update/$1');
$routes->delete('/api/transactions/(:num)', 'Api\TransactionApi::delete/$1');
$routes->get('/api/docs', 'ApiDocs::index');

$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/about', 'About::index');