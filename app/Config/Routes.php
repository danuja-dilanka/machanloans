<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//AUTH CONTROLLER
$routes->match(['get', 'post'], '/', 'Auth::index');
$routes->match(['get', 'post'], '/login', 'Auth::login');
$routes->match(['get', 'post'], '/auth/(:any)', 'Auth::$1');
$routes->match(['get', 'post'], '/dashboard', 'Auth::dashboard');
$routes->match(['get', 'post'], '/logout', 'Auth::logout');

//HOME CONTROLLER
$routes->match(['get', 'post'], 'home', 'Home::index');
$routes->match(['get', 'post'], 'home/(:any)', 'Home::$1');
$routes->match(['get', 'post'], 'home/(:any)/(:any)', 'Home::$1/$2');
$routes->match(['get', 'post'], 'home/(:any)/(:any)/(:any)', 'Home::$1/$2/$3');

//MEMBER CONTROLLER
$routes->match(['get', 'post'], 'member', 'Member::index');
$routes->match(['get', 'post'], 'member/(:any)', 'Member::$1');
$routes->match(['get', 'post'], 'member/(:any)/(:any)', 'Member::$1/$2');
$routes->match(['get', 'post'], 'member/(:any)/(:any)/(:any)', 'Member::$1/$2/$3');

//LOAN CONTROLLER
$routes->match(['get', 'post'], 'loan', 'Loan::index');
$routes->match(['get', 'post'], 'loan/(:any)', 'Loan::$1');
$routes->match(['get', 'post'], 'loan/(:any)/(:any)', 'Loan::$1/$2');
$routes->match(['get', 'post'], 'loan/(:any)/(:any)/(:any)', 'Loan::$1/$2/$3');

//WEB PUBLIC CONTROLLER
$routes->match(['get', 'post'], '/loan_application', 'Web::loan_application');
$routes->match(['get', 'post'], '/loan_application/done/$1', 'Web::done/$1');
$routes->match(['get', 'post'], '/loan_application/guarantors/(:any)/(:any)', 'Web::guarantors/$1/$2');
$routes->match(['get', 'post'], '/loan_application/(:any)', 'Web::loan_application/$1');
$routes->match(['get', 'post'], '/loan_application/(:any)/(:any)', 'Web::loan_application/$1/$2');
$routes->match(['get', 'post'], '/loan_check/(:any)', 'Web::loan_check/$1');

//REPORTS CONTROLLER
$routes->match(['get', 'post'], '/report/(:any)', 'Reports::$1');
$routes->match(['get', 'post'], '/report/(:any)/(:any)', 'Reports::$1/$2');

//INVESTMENT CONTROLLER
$routes->match(['get', 'post'], '/investment/(:any)', 'Investment::$1');
$routes->match(['get', 'post'], '/investment/(:any)/(:any)', 'Investment::$1/$2');

//PUBLIC VIEW CONTROLLER
$routes->match(['get', 'post'], '/web/(:any)', 'Web::$1');
$routes->match(['get', 'post'], '/web/(:any)/(:any)', 'Web::$1/$2');
$routes->match(['get', 'post'], '/web/(:any)/(:any)/(:any)', 'Web::$1/$2/$3');

//SETTINGS CONTROLLER
$routes->match(['get', 'post'], '/setting/(:any)', 'Setting::$1');
$routes->match(['get', 'post'], '/setting/(:any)/(:any)', 'Setting::$1/$2');
$routes->match(['get', 'post'], '/setting/(:any)/(:any)/(:any)', 'Setting::$1/$2/$3');

//API CONTROLLER
$routes->match(['post'], '/api/(:any)', 'API::$1');
$routes->match(['post'], '/api/(:any)/(:any)', 'API::$1/$2');

$routes->match(['get', 'post'], '/api/send_sms', 'API::send_sms');
$routes->match(['get', 'post'], '/api/send_email', 'API::send_email');

//DATA TABLE AJAX CALL
$routes->match(['get', 'post'], '/get_ajax_data/(:any)', 'View_data::$1');
$routes->match(['get', 'post'], '/get_ajax_data/(:any)/(:any)', 'View_data::$1/$2');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
