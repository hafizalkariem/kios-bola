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

$routes->get('/admin/jersey', 'Admin::index');
$routes->get('/admin/klub', 'Admin::add_klub');
$routes->get('/admin/apparel', 'Admin::add_apparel');

// CRUD jersey
$routes->get('/admin/jersey/create', 'Jersey::create');
$routes->get('/jersey/edit/(:segment)', 'Jersey::edit/$1');
$routes->post('/admin/jersey/save', 'Jersey::save');
$routes->post('/jersey/update/(:num)', 'Jersey::update/$1');
$routes->delete('/admin/jersey/(:num)', 'Jersey::delete/$1');

//  klub crud
$routes->get('klub/create', 'klubController::index');
$routes->get('klub/edit/(:segment)', 'klubController::edit/$1');
$routes->post('klub/save', 'klubController::save');
