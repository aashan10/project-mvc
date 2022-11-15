<?php

use App\Controllers\PageController;
/** @var $router \App\Router\Router */


$router->get('/', PageController::class . '@index');
$router->get('/contact', PageController::class . '@contact');
$router->post('/contact', PageController::class . '@contactPost');
$router->get('/contact/list', PageController::class . '@contactList');
$router->get('/contact/view', PageController::class . '@contactView');
