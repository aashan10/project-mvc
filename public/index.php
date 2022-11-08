<?php

require_once '../vendor/autoload.php';

$router = new App\Router\Router();

//$router->get('/', \App\Controllers\HomeController::class . '@index');

$router->get( '/', function() {
    echo "This is home page!";
//    return \App\View\View::make('home', []);
});

$router->get( '/contact', function() {
    echo "This is contact page!";
//    return view('contact');
});
$router->post( '/contact', function() {
    echo "This is contact page with POST method!";
//    return view('contact');
});

$router->get( '/features', function() {
    echo "This is features page!";
//    return view('features');
});

$router->get( '/about', function() {
    echo "This is about Page!";
});


$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


if (!isset($router->routes()[$method][$uri])) {
    http_response_code(404);
    echo "Page not found!";
    exit(0);
}

$action = $router->routes()[$method][$uri];
$action();

