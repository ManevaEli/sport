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
$routes->get('/calendar', 'Calendar::index');
$routes->get('/calendar/loadEvents', 'Calendar::loadEvents');
$routes->get('/reservations', 'Home::mesReservations');
$routes->get('/reservation/annuler/(:num)', 'Home::annulerReservation/$1');

// admin
$routes->get('/admin/creneaux', 'Home::creneau_admin');
$routes->get('/admin/dashboard', 'Home::dashboard_admin');
$routes->get('/admin/edit_creneau', 'Home::edit_creneau');
$routes->get('/admin/reservations', 'Home::reservations_admin');
