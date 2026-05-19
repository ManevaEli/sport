<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'Home::login');
$routes->post('/inscription', 'Home::inscription');
$routes->get('/login', 'Home::index');      
$routes->get('/inscription', 'Home::index');