<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/usuarios', 'Home::mostrarUsuario');
$routes->get('/livros', 'LivrosController::index');
$routes->get('login', 'UserController::login'); 
$routes->match(['get', 'post'], 'registrar','UserController::criarUsuario');
$routes->match(['get', 'post'], 'livros/adicionar', 'LivrosController::adicionar'); //controller dos livro que traz do public function
$routes->match(['get', 'post'], 'livros/editar/(:num)', 'LivrosController::editar/$1'); //controller->metodo
$routes->get('livros/deletar/(:num)', 'LivrosController::deletar/$1');