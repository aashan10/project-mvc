<?php

use App\Controllers\PageController;
use App\Database\Connection;
use App\Model\Contact;

/** @var $router \App\Router\Router */


$router->get('/', PageController::class . '@index');
$router->get('/contact', PageController::class . '@contact');
$router->post('/contact', PageController::class . '@contactPost');
$router->get('/contact/list', PageController::class . '@contactList');
$router->get('/contact/view', PageController::class . '@contactView');
$router->get('/db-test', function () {
    $model = new Contact;

    dd($model->all());
});