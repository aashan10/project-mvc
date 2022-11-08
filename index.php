<?php

require_once 'vendor/autoload.php';

$router = new App\Router\Router();

$router->get('/', \App\Controllers\HomeController::class . '@index');

$router->get( '/', function() {
    return \App\View\View::make('home', []);
});

$router->get( '/contact', function() {
    return view('contact');
});
$router->post( '/contact', function() {
    return view('contact');
});

$router->get( '/features', function() {
    return view('features');
});

$router->get( '/users/create', function() {
    return view('user/create', [
        'title' => 'App'
    ]);
});

$router->get( '/about', function() {
    echo "This is about Page!";
});


$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


if (!isset($router->routes()[$method][$uri])) {
    return view('errors/404');
}

$action = $router->routes()[$method][$uri];
$action();

