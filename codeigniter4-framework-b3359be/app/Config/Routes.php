<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection
 */
$routes->get('/', 'Home::index');
$routes->get('/log', 'Home::log');      
$routes->get('/inscription', 'Home::insc');

$routes->post('/login', 'Home::login');
$routes->post('/inscription', 'Home::inscription');
$routes->get('/logout', 'Home::logout');

$routes->get('/client', 'Home::client');
$routes->get('/creneaux', 'Home::creneaux');
$routes->get('/reserver/(:num)', 'Home::reserver/$1');