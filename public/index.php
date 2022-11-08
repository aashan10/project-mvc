<?php

use App\Controllers\PageController;

require_once '../vendor/autoload.php';

$router = new App\Router\Router();

$router->get('/', PageController::class . '@home');
$router->get('/contact', PageController::class . '@contact');
$router->get('/features', PageController::class . '@features');
$router->get('/about', PageController::class . '@about');
$router->post('/contact', PageController::class . '@saveContact');


$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


if (!isset($router->routes()[$method][$uri])) {
    $pageController = new PageController();
    return $pageController->notFound();
}

$action = $router->routes()[$method][$uri];

if (is_callable($action)) {
    return $action();
}
// If controller is not a callable, it is definitely a class name along with a public method
// separated by '@'
// The first part being the controller name and the second part being the method name
$action = explode('@', $action);

// If there are not exactly two elements in the array $action, there must be something wrong with how
// we have registered the routes.

if (count($action) !== 2) {
    http_response_code(500);
    echo "There was something wrong when you registered the route. Make sure that the class exists and the method being used is public.";
    exit(0);
}

$controllerName = $action[0];
$method = $action[1];

// Instantiate the controller class
$controllerObject = new $controllerName();
// Execute the method on the controller object
return $controllerObject->$method();


