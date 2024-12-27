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

$routes->get('dashboard/ajukanSK', 'Dashboard::ajukanSK'); // Menampilkan form pengajuan SK
$routes->post('pengaju/dashboard/ajukanSK', 'Dashboard::ajukanSK'); // Memproses pengajuan SK
$routes->post('admin/dashboard/updateStatusSK', 'Dashboard::updateStatusSK');
$routes->post('admin/dashboard/createReport', 'Dashboard::createReport',['filter' => 'auth']);
$routes->get('admin/dashboard/publishSK/(:num)', 'Dashboard::publishSK/$1',['filter' => 'auth']);
$routes->post('staff/dashboard/verifySK/(:num)', 'Dashboard::verifySK/$1');
$routes->post('pimpinan/verifySK/(:num)', 'Dashboard::verifySK/$1');

$routes->get('/dashboard/cetakLaporan/(:num)', 'Dashboard::cetakLaporan/$1');
$routes->get('image/(:segment)', 'ImageController::display/$1');

/**$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    // Dashboard admin
    $routes->get('dashboard', 'dashboard::admin');
    
    // Membuat laporan SK
    $routes->get('createReport', 'dashboard::createReport');
    $routes->post('createReport', 'dashboard::createReport');
    
    // Formulir untuk memperbarui status SK
    $routes->get('updateStatusForm/(:num)', 'dashboard::showUpdateStatusForm/$1');
    $routes->post('updateStatus', 'dashboard::updateStatusSK');
    
    // Publikasi SK
    $routes->get('publishSK/(:num)', 'dashboard::publishSK/$1');
});
*/