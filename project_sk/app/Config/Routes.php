<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#$routes->get('/', 'Home::index');
$routes->get('/', 'login::index');
#$routes->get('/login', 'Login::index');
#$routes->post('/login/auth', 'Login::auth');
#$routes->get('/logout', 'Login::logout');
#rute jika ingin lihat hasil view
/**$routes->get('/admin_dashboard', 'Dashboard::admin');
$routes->get('/pimpinan_dashboard', 'Dashboard::pimpinan');
$routes->get('/pengaju_dashboard', 'Dashboard::pengaju');
$routes->get('/staff_dashboard', 'Dashboard::staff');
*/

// Routes for roles (optional examples)
#$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');

// Halaman dashboard sesuai peran
$routes->get('/admin/dashboard', 'Dashboard::admin', ['filter' => 'auth']);
$routes->get('/pengaju/dashboard', 'Dashboard::pengaju', ['filter' => 'auth']);
$routes->get('/pimpinan/dashboard', 'Dashboard::pimpinan', ['filter' => 'auth']);
$routes->get('/staff/dashboard', 'Dashboard::staff', ['filter' => 'auth']);
$routes->post('dashboard/ajukanSK', 'Dashboard::ajukanSK');
$routes->get('dashboard/ajukanSK', 'Dashboard::ajukanSK');
$routes->get('dashboard/daftarSK', 'Dashboard::daftarSK', ['filter' => 'auth']);

$routes->get('dashboard/download/(:num)', 'Dashboard::download/$1');


