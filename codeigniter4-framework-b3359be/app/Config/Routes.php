<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'Home::login');
$routes->post('/inscription', 'Home::inscription');
$routes->get('/log', 'Home::log');      
$routes->get('/inscription', 'Home::insc');
$routes->get('calendar', 'Calendar::index');
$routes->get('calendar/loadEvents', 'Calendar::loadEvents');