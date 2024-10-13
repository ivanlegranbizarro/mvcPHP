<?php

class Router
{
    protected $routes = [];

    public function registerRoute(string $method, string $uri, string $controller): void
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }


    public function get(string $uri, string $controller): void
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller): void
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    public function put(string $uri, string $controller): void
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    public function delete(string $uri, string $controller): void
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    public function error(int $httpCode): void
    {
        http_response_code($httpCode);
        loadView('error/' . $httpCode);
        exit;
    }

    public function route(string $uri, string $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require_once basePath($route['controller']);
                return;
            }
        }
        $this->error(404);
    }
}
