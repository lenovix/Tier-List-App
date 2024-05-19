<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');  // Tambahkan jika ada halaman about
$routes->get('/contact', 'Home::contact');  // Tambahkan jika ada halaman contact
$routes->get('/createTable', 'Home::createTable');
$routes->post('/submitTableConfig', 'Home::submitTableConfig');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * This routing file is automatically loaded, and additional routes can be added below.
 */







// use CodeIgniter\Router\RouteCollection;

// /**
//  * @var RouteCollection $routes
//  */
// $routes->get('/', 'Home::index');
