<?php

namespace App;

use App\Router\Router;
use App\Controllers\PageController;

class Kernel
{
    protected Router $router;


    public function __construct()
    {
        $this->loadRouter();
    }

    public function loadRouter() {
        $router = new Router();

        include __DIR__ . '/../routes/web.php';

        $this->router = $router;
    }

    public function checkCurrentRoute(): string | \Closure
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = explode('?', $_SERVER['REQUEST_URI'])[0];


        if (!isset($this->router->routes()[$method][$uri])) {
            throw new \Exception('404 Route not found!');
        }

        return $this->router->routes()[$method][$uri];
    }

    public function executeController () {
        $action = $this->checkCurrentRoute();

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
    }

}