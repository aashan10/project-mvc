<?php

namespace App\Router;

use Closure;

class Router
{
    /** @var array<string, array<string, callable|string>>  */
    protected array $routes = [];

    protected function register(string $method, string $endpoint, Closure | string $action): self
    {

        if (is_string($action)) {
            $posiotion = strpos($action, '@');

            if (!$posiotion) {
                throw new \Exception('Action format should be of Controller@method name');
            }
            $controller = explode('@', $action);
            $className = $controller[0];
            $methodName = $controller[1];

            if (!class_exists($className)) {
                throw new \Exception('Class ' . $className . ' does not exist!');
            }

            if (!method_exists($className, $methodName)) {
                throw new \Exception('Method ' . $className . '::'.$methodName.' does not exist!');
            }
        }

        $this->routes[$method][$endpoint] = $action;
        return $this;
    }

    public function get(string $endpoint, Closure | string $action): self
    {
        return $this->register('GET', $endpoint, $action);
    }

    public function post(string $endpoint, Closure | string $action): self
    {
        return $this->register('POST', $endpoint, $action);
    }

    public function routes(): array
    {
        return $this->routes;
    }
}