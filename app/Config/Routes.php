<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ============================================================
// PUBLIC ROUTES - WALANG AUTHENTICATION FILTER
// ============================================================

$routes->get('/', 'Auth::login');

$routes->get('login', 'Auth::login');

$routes->post('loginProcess', 'Auth::loginProcess');

$routes->get('logout', 'Auth::logout');


// ============================================================
// PROTECTED ROUTES - KAILANGAN NAKA-LOGIN
// ============================================================

$routes->group('', ['filter' => 'auth'], static function ($routes) {

    // --------------------------------------------------------
    // CUSTOMERS MANAGEMENT
    // --------------------------------------------------------

    $routes->get(
        'customers',
        'CustomerController::index'
    );

    $routes->get(
        'customers/new',
        'CustomerController::new'
    );

    $routes->post(
        'customers/store',
        'CustomerController::store'
    );

    $routes->get(
        'customers/edit/(:num)',
        'CustomerController::edit/$1'
    );

    $routes->post(
        'customers/update/(:num)',
        'CustomerController::update/$1'
    );

    $routes->get(
        'customers/delete/(:num)',
        'CustomerController::delete/$1'
    );


    // --------------------------------------------------------
    // USERS MANAGEMENT
    // --------------------------------------------------------

    $routes->get(
        'users',
        'UserController::index'
    );

    $routes->get(
        'users/new',
        'UserController::new'
    );

    $routes->post(
        'users/create',
        'UserController::create'
    );

    $routes->get(
        'users/edit/(:num)',
        'UserController::edit/$1'
    );

    $routes->post(
        'users/update/(:num)',
        'UserController::update/$1'
    );

    $routes->get(
        'users/delete/(:num)',
        'UserController::delete/$1'
    );

});