<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/login2', 'Login::login');
$routes->post('/login2', 'Login::login');
$routes->get('/dashboard2', 'Dashboard::index');
$routes->get('/register', 'Login::register');
$routes->get('/profile', 'Login::profile');
$routes->get('/user', 'User::index');
$routes->post('/simpanUser', 'User::save');
$routes->delete('hapusUser/(:segment)', 'User::delete/$1');

