<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'page::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/shop', 'Page::pricing', ['filter' => 'login']);
$routes->get('/shop/search', 'Page::search_klub');
$routes->get('/jersey', 'jersey::index');



// admin

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/jersey', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/klub', 'Admin::add_klub', ['filter' => 'role:admin']);
$routes->get('/admin/apparel', 'Admin::add_apparel', ['filter' => 'role:admin']);


// search

$routes->get('admin/klub/search', 'Admin::search_klub');
$routes->get('admin/jersey/search', 'Admin::search_jersey');
$routes->get('admin/apparel/search', 'Admin::search_apparel');

// CRUD jersey
$routes->get('/admin/jersey/create', 'Jersey::create', ['filter' => 'role:admin']);
$routes->get('/admin/jersey/edit/(:segment)', 'Jersey::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/jersey/save', 'Jersey::save', ['filter' => 'role:admin']);
$routes->post('/admin/jersey/update/(:num)', 'Jersey::update/$1', ['filter' => 'role:admin']);
$routes->delete('/admin/jersey/(:num)', 'Jersey::delete/$1', ['filter' => 'role:admin']);

//  klub crud
$routes->get('/admin/klub/create', 'KlubController::index');
$routes->get('/admin/klub/edit/(:segment)', 'KlubController::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/klub/update/(:num)', 'KlubController::update/$1', ['filter' => 'role:admin']);
$routes->post('admin/klub/save', 'KlubController::save');
$routes->delete('/admin/klub/(:num)', 'KlubController::delete/$1', ['filter' => 'role:admin']);


// apparel crud
$routes->get('/admin/apparel/create', 'apparelController::index');
$routes->get('/admin/apparel/edit/(:segment)', 'apparelController::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/apparel/update/(:num)', 'apparelController::update/$1', ['filter' => 'role:admin']);
$routes->post('/admin/apparel/save', 'apparelController::save');
$routes->delete('/admin/apparel/(:num)', 'apparelController::delete/$1', ['filter' => 'role:admin']);

// login & register

// profile auth
$routes->group('', ['filter' => 'login'], function ($routes) {
    $routes->get('/profile', 'Profile::index');
    $routes->get('/profile/edit', 'Profile::edit');
    $routes->post('/profile/update', 'Profile::update');
});


$routes->setAutoRoute(true);
