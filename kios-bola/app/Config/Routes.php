<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'page::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/shop', 'Page::pricing');
$routes->get('/jersey', 'jersey::index');

// admin

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/jersey', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/klub', 'Admin::add_klub', ['filter' => 'role:admin']);
$routes->get('/admin/apparel', 'Admin::add_apparel', ['filter' => 'role:admin']);

// CRUD jersey
$routes->get('/admin/jersey/create', 'Jersey::create', ['filter' => 'role:admin']);
$routes->get('/admin/jersey/edit/(:segment)', 'Jersey::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/jersey/save', 'Jersey::save', ['filter' => 'role:admin']);
$routes->post('/admin/jersey/update/(:num)', 'Jersey::update/$1', ['filter' => 'role:admin']);
$routes->delete('/admin/jersey/(:num)', 'Jersey::delete/$1', ['filter' => 'role:admin']);

//  klub crud
$routes->get('/admin/klub/create', 'klubController::index');
$routes->get('/admin/klub/edit/(:segment)', 'klubController::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/klub/update/(:num)', 'klubController::update/$1', ['filter' => 'role:admin']);
$routes->post('admin/klub/save', 'klubController::save');
$routes->delete('/admin/klub/(:num)', 'klubController::delete/$1', ['filter' => 'role:admin']);

// apparel crud
$routes->get('/admin/apparel/create', 'apparelController::index');
$routes->get('/admin/apparel/edit/(:segment)', 'apparelController::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/apparel/update/(:num)', 'apparelController::update/$1', ['filter' => 'role:admin']);
$routes->post('/admin/apparel/save', 'apparelController::save');
$routes->delete('/admin/apparel/(:num)', 'apparelController::delete/$1', ['filter' => 'role:admin']);

// login & register

$routes->setAutoRoute(true);
