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
$routes->get('/admin/dashboard', 'Dashboard::admin', ['filter' => 'auth']);
$routes->get('/pengaju/dashboard', 'Dashboard::pengaju', ['filter' => 'auth']);
$routes->get('/pimpinan/dashboard', 'Dashboard::pimpinan', ['filter' => 'auth']);
$routes->get('/staff/dashboard', 'Dashboard::staff', ['filter' => 'auth']);
