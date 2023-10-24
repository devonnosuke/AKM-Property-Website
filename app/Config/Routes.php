<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'LandingPages::index');
$routes->get('/properti/(:any)', 'LandingPages::property/$1');
$routes->get('/properti', 'LandingPages::property');
$routes->get('/promo/(:any)', 'LandingPages::promo/$1');
$routes->get('/promo', 'LandingPages::promo');
// $routes->get('/portfolio', 'LandingPages::portfolio');
$routes->get('/contact', 'LandingPages::contact');
// $routes->get('/faq', 'LandingPages::faq');
$routes->get('/dashboard', 'Admin\Dashboard::index', ['filter' => 'role:admin']);
$routes->get('/admin', 'Admin\Dashboard::index', ['filter' => 'role:admin']);
$routes->get('/download/(:any)', 'LandingPages::download/$1');
$routes->post('/sendMail', 'LandingPages::sendMail');
$routes->post('/sendWA', 'LandingPages::sendWA');
// $routes->get('/properti/(:any)', 'LandingPages::download/$1');

$routes->get('/admin/personal', 'Admin\Personal::index', ['filter' => 'role:admin']);
$routes->post('/admin/personal/save', 'Admin\Personal::save', ['filter' => 'role:admin']);

$routes->get('/admin/skills', 'Admin\Skills::index', ['filter' => 'role:admin']);
$routes->get('/admin/skill/drop/(:any)', 'Admin\Skills::index', ['filter' => 'role:admin']);
$routes->delete('/admin/skill/(:any)', 'Admin\Skills::drop/$1', ['filter' => 'role:admin']);
$routes->post('/admin/skill_save', 'Admin\Skills::save', ['filter' => 'role:admin']);
// $routes->get('/admin/skill_drop/(:num)', 'Admin\Skills::drop/$1', ['filter' => 'role:admin']);

$routes->get('/admin/contacts', 'Admin\Contacts::index', ['filter' => 'role:admin']);
$routes->get('/admin/contacts/drop/(:any)', 'Admin\Contacts::index', ['filter' => 'role:admin']);
$routes->delete('/admin/social/(:any)', 'Admin\Contacts::drop/$1', ['filter' => 'role:admin']);
$routes->post('/admin/social_save', 'Admin\Contacts::save', ['filter' => 'role:admin']);
$routes->post('/admin/address_save', 'Admin\Contacts::saveAddressContact', ['filter' => 'role:admin']);

$routes->get('/admin/portfolio', 'Admin\Portfolio::index', ['filter' => 'role:admin']);
$routes->get('/admin/portfolio/drop/(:any)', 'Admin\Portfolio::index', ['filter' => 'role:admin']);
$routes->delete('/admin/portfolio/(:any)', 'Admin\Portfolio::drop/$1', ['filter' => 'role:admin']);
$routes->delete('/admin/portfolio/(:any)/(:any)', 'Admin\Portfolio::drop/$1/$2', ['filter' => 'role:admin']);
$routes->post('/admin/portfolio_save', 'Admin\Portfolio::save', ['filter' => 'role:admin']);

$routes->get('/admin/sliders', 'Admin\Sliders::index', ['filter' => 'role:admin']);
$routes->get('/admin/sliders/(:any)', 'Admin\Sliders::edit/$1', ['filter' => 'role:admin']);
$routes->get('/admin/sliders/drop/(:any)', 'Admin\Sliders::index', ['filter' => 'role:admin']);
$routes->delete('/admin/sliders/(:any)/(:any)', 'Admin\Sliders::drop/$1/$2', ['filter' => 'role:admin']);
$routes->post('/admin/sliders/save', 'Admin\Sliders::save', ['filter' => 'role:admin']);
$routes->get('/admin/add_slider', 'Admin\Slider::add', ['filter' => 'role:admin']);

$routes->post('/admin/cta_save', 'Admin\Services::cta_save', ['filter' => 'role:admin']);
$routes->get('/admin/services', 'Admin\Services::index', ['filter' => 'role:admin']);
$routes->get('/admin/services/(:any)', 'Admin\Services::edit/$1', ['filter' => 'role:admin']);
$routes->get('/admin/services/drop/(:any)', 'Admin\Services::index', ['filter' => 'role:admin']);
$routes->delete('/admin/service/(:any)/(:any)', 'Admin\Services::drop/$1/$2', ['filter' => 'role:admin']);
$routes->post('/admin/service/save', 'Admin\Services::save', ['filter' => 'role:admin']);
$routes->get('/admin/add_service', 'Admin\Services::add', ['filter' => 'role:admin']);

$routes->get('/admin/educational', 'Admin\Educational::index', ['filter' => 'role:admin']);
$routes->get('/admin/educational/drop/(:any)', 'Admin\Educational::index', ['filter' => 'role:admin']);
$routes->delete('/admin/educational/(:any)', 'Admin\Educational::drop/$1', ['filter' => 'role:admin']);
$routes->post('/admin/educational/save', 'Admin\Educational::save', ['filter' => 'role:admin']);

$routes->get('/admin/faq', 'Admin\Faq::index', ['filter' => 'role:admin']);
$routes->get('/admin/faq/drop/(:any)', 'Admin\Faq::index', ['filter' => 'role:admin']);
$routes->delete('/admin/faq/(:any)', 'Admin\Faq::drop/$1', ['filter' => 'role:admin']);
$routes->post('/admin/faq_save', 'Admin\Faq::save', ['filter' => 'role:admin']);

// ========================== AKM Property
// ==== Property Routes

$routes->get('/admin/property', 'Admin\Property::index', ['filter' => 'role:admin']);
$routes->get('/admin/property/(:any)', 'Admin\Property::edit/$1', ['filter' => 'role:admin']);
$routes->get('/admin/property/drop/(:any)', 'Admin\Property::index', ['filter' => 'role:admin']);
$routes->delete('/admin/property/(:any)/(:any)', 'Admin\Property::drop/$1/$2', ['filter' => 'role:admin']);
$routes->post('/admin/property/save', 'Admin\Property::save', ['filter' => 'role:admin']);
$routes->get('/admin/add_property', 'Admin\Property::add', ['filter' => 'role:admin']);

// ==== PropertyImages Routes
$routes->delete('/admin/propertyimage/(:any)', 'Admin\PropertyImage::drop/$1', ['filter' => 'role:admin']);
$routes->get('/admin/property-image/(:any)', 'Admin\PropertyImage::index/$1', ['filter' => 'role:admin']);
$routes->post('/admin/propertyimage/save', 'Admin\PropertyImage::save', ['filter' => 'role:admin']);

$routes->get('/admin/promo', 'Admin\Promo::index', ['filter' => 'role:admin']);
$routes->get('/admin/promo/(:any)', 'Admin\Promo::edit/$1', ['filter' => 'role:admin']);
$routes->get('/admin/promo/drop/(:any)', 'Admin\Promo::index', ['filter' => 'role:admin']);
$routes->delete('/admin/promo/(:any)/(:any)', 'Admin\Promo::drop/$1/$2', ['filter' => 'role:admin']);
$routes->post('/admin/promo/save', 'Admin\Promo::save', ['filter' => 'role:admin']);
$routes->get('/admin/promo', 'Admin\Promo::add', ['filter' => 'role:admin']);
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
