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
$routes->get('/admin/jersey', 'Admin::index');
$routes->get('/admin/klub', 'Admin::add_klub');
$routes->get('/admin/apparel', 'Admin::add_apparel');
$routes->get('/admin/jersey/create', 'Jersey::create');
$routes->post('/admin/jersey/save', 'Jersey::save');
$routes->get('/admin/jersey/delete/(:num)', 'Jersey::delete/$1');
$routes->get('klub/create', 'klubController::index');
$routes->post('klub/save', 'klubController::save');
$routes->delete('/admin/jersey/(:num)', 'Jersey::delete/$1');
