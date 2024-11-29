<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'AuthController::login');
$routes->post('/process-login', 'AuthController::processLogin');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/admin', 'AdminController::index');
