<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');

// Routes for roles (optional examples)
$routes->get('/admin', 'Admin::index', ['filter' => 'auth']);
$routes->get('/pimpinan', 'Pimpinan::index', ['filter' => 'auth']);
$routes->get('/staff', 'Staff::index', ['filter' => 'auth']);
$routes->get('/pengaju', 'Pengaju::index', ['filter' => 'auth']);
