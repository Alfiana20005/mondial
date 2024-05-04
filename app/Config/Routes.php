<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/login2', 'Login::login');
$routes->post('/login2', 'Login::login');
$routes->get('/logout', 'Login::logout');
$routes->post('/save_register', 'Login::save');
$routes->get('/dashboard2', 'Dashboard::index');
$routes->get('/register', 'Login::register');
$routes->get('/profile', 'User::profile');
$routes->get('/profile/(:num)', 'User::profile/$1');
$routes->get('/user', 'User::index');
$routes->post('/simpanUser', 'User::save');
$routes->delete('hapusUser/(:segment)', 'User::delete/$1');
$routes->post('/status_approve', 'User::status_approve');
$routes->get('/updatePass/(:segment)', 'User::updatePass/$1');
$routes->post('/updateFoto/(:segment)', 'User::updateFoto/$1');
$routes->get('/updateFoto/(:segment)', 'User::updateFoto/$1');
$routes->delete('/hapusFoto/(:segment)', 'User::deleteFoto/$1');
$routes->post('hapusFoto/(:num)',  'User::updatePass/$1');
