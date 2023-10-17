<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/usuarios', 'Home::mostrarUsuario');
$routes->get('/livros', 'Livros::index');
$routes->get('livros/adicionar', 'Livros::adicionar');
$routes->post('livros/add', 'Livros::add'); //controller Livros no método add
$routes->match(['get', 'post'], 'livros/editar/(:num)', 'Livros::editar/$1');
$routes->get('livros/deletar/(:num)', 'Livros::deletar/$1');