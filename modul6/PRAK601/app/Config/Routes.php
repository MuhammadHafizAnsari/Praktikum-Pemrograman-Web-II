<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->group('', ["filter" => 'auth'], static function ($routes) {
    $routes->get('/', 'BukuController::index');
    $routes->get('/buku', 'BukuController::index');
    $routes->get('/buku/create', 'BukuController::create');
    $routes->post('/buku/create', 'BukuController::store');
    $routes->get('/buku/(:num)/edit', 'BukuController::edit/$1');
    $routes->post('/buku/(:num)/edit', 'BukuController::update/$1');
    $routes->delete('/buku/(:num)/delete', 'BukuController::delete/$1');
    $routes->get('/logout', 'UserController::logout');
});

$routes->get('/login', 'UserController::index');
$routes->post('/login', 'UserController::login');

$routes->get('/signup', 'UserController::signUp', ['as' => 'signup']);
$routes->post('/signup', 'UserController::signUpProcess');

$routes->get('/forgot-password', 'UserController::forgotPassword');
$routes->post('/forgot-password', 'UserController::forgotPasswordProcess');

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}