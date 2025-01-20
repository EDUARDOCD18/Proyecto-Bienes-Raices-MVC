<?php

require_once __DIR__ .  '/../includes/app.php';

use MVC\Router;

$router = new Router();

$router->get('/nosotros', 'funcion_nosotros');
$router->get('/vendedor', 'vendedor');
$router->get('/tienda', 'tienda');
$router->get('/admin', 'funcion_admin');

$router->comprobarRutas();
