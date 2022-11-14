<?php

use App\Controllers\PageController;
/** @var $router \App\Router\Router */


$router->get('/', PageController::class . '@index');
$router->get('/contact', PageController::class . '@contact');
//$router->get('/features', PageController::class . '@features');
//$router->get('/about', PageController::class . '@about');
//$router->post('/contact', PageController::class . '@saveContact');
