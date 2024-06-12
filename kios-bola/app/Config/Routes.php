<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'page::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/shop', 'Page::pricing');
$routes->get('/shop/manchester_united', 'jersey::manchester_united');
$routes->get('/shop/liverpool', 'jersey::liverpool');
$routes->get('/shop/manchester_city', 'jersey::manchester_city');
$routes->get('/shop/barcelona', 'jersey::barcelona');
$routes->get('/shop/psg', 'jersey::psg');
$routes->get('/shop/bayern_muenchen', 'jersey::bayern_muenchen');
$routes->get('/jersey', 'jersey::index');
$routes->get('/admin/jersey', 'Admin::index');
