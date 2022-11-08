<?php

namespace App\Router;

use Closure;

class Router
{
    /** @var array<string, array<string, callable|string>>  */
    protected array $routes = [];

    protected function register(string $method, string $endpoint, Closure $action): self
    {
        $this->routes[$method][$endpoint] = $action;
        return $this;
    }

    public function get(string $endpoint, Closure $action): self
    {
        return $this->register('GET', $endpoint, $action);
    }

    public function post(string $endpoint, Closure $action): self
    {
        return $this->register('POST', $endpoint, $action);
    }

    public function routes(): array
    {
        return $this->routes;
    }
}