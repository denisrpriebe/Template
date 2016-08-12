<?php

namespace App\Components;

use App\Components\Configuration;

class Route {

    protected $routes;

    public function __construct(Configuration $configuration) {
        $this->routes = $configuration->routes();
    }

    public function routes() {
        return array_keys($this->routes);
    }

    public function load($route) {

        if (!$this->exists($route)) {
            echo 'Route does not exist';
            die();
        }

        $controllerParts = explode('@', $this->routes[$route]['controller']);
        $controller = new $controllerParts[0]($this->routes[$route]);
        return $controller->$controllerParts[1]();
    }

    public function exists($route) {
        return in_array($route, $this->routes()) ? true : false;
    }

    public function to($name) {
        foreach ($this->routes as $route => $routeOptions) {
            if ($routeOptions['name'] == $name) {
                return '?' . $route;
            }
        }
    }

}
