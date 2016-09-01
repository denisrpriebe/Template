<?php

namespace App\Components;

use App\Components\Configuration;
use App\Exceptions\RouteNotFoundException;

class Route {

    /**
     * The routes from the routes configuration file.
     * 
     * @var array
     */
    protected $routes;

    /**
     * Initialize our routes.
     * 
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration) {
        $this->routes = $configuration->routes();
    }

    /**
     * The route urls.
     * 
     * @return array
     */
    public function routes() {
        return array_keys($this->routes);
    }

    /**
     * Loads the the given route.
     * 
     * @param array $route
     * @return \App\Components\controllerParts
     */
    public function load($route) {
        $controllerParts = explode('@', $this->routes[$route]['controller']);
        $controller = 'App\\Controllers\\' . $controllerParts[0];
        return new $controller($this->routes[$route], $controllerParts[1]);
    }

    /**
     * Checks if the given route exists in configuration.
     * 
     * @param type $route
     * @return type
     */
    public function exists($route) {
        return in_array($route, $this->routes()) ? true : false;
    }

    /**
     * Creates the proper url given the route name.
     * 
     * @param type $name
     * @return type
     * @throws RouteNotFoundException
     */
    public function to($name) {
        
        foreach ($this->routes as $route => $routeOptions) {
            if ($routeOptions['name'] == $name) {
                return '?' . $route;
            }
        }
        
        throw new RouteNotFoundException($name);
    }

}
