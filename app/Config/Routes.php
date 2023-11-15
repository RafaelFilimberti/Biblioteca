<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/usuarios', 'Home::mostrarUsuario');
$routes->get('/livros', 'LivrosController::index');

$routes->match(['get', 'post'], 'livros/adicionar', 'LivrosController::adicionar'); //controller dos livro que traz do public function
$routes->match(['get', 'post'], 'livros/editar/(:num)', 'LivrosController::editar/$1'); //controller->metodo
<<<<<<< Updated upstream
$routes->get('livros/deletar/(:num)', 'LivrosController::deletar/$1');
=======
$routes->get('livros/deletar/(:num)', 'LivrosController::deletar/$1');
$routes->match(['get', 'post'],'livros/reservas/(:num)', 'ReservasController::index/$1'); 

/* $routes->match(['get', 'post'],'reservas/view/(:num)', 'ReservasController::check_disponibilidade/$1'); */ 
>>>>>>> Stashed changes
