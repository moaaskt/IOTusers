<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->resource('sensores');


// Rota para a página inicial (formulário de login)
$routes->get('/', 'AuthController::login');
$routes->post('auth/attempt-login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');

// --- Rotas Manuais para o CRUD ---
// Grupo de rotas que exigem autenticação (passam pelo filtro 'auth')
$routes->group('sensores', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Sensores::index');
    $routes->get('new', 'Sensores::new');
    $routes->post('create', 'Sensores::create');
    $routes->get('edit/(:num)', 'Sensores::edit/$1');
    $routes->post('update/(:num)', 'Sensores::update/$1');
    $routes->post('delete/(:num)', 'Sensores::delete/$1');
});


