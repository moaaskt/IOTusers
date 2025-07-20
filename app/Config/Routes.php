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
$routes->get('sensores', 'Sensores::index');          // Rota para a lista
$routes->get('sensores/new', 'Sensores::new');        // Rota para mostrar o formulário
$routes->post('sensores/create', 'Sensores::create');   // Rota para salvar os dados do formulário
$routes->get('sensores/edit/(:num)', 'Sensores::edit/$1');
$routes->post('sensores/update/(:num)', 'Sensores::update/$1');
$routes->post('sensores/delete/(:num)', 'Sensores::delete/$1');


