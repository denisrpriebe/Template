<?php

namespace App\Facades\Components;

class Route {
    
    public static function routes() {
        return $GLOBALS['_route']->routes();
    }
    
    public static function load($route) {
        return $GLOBALS['_route']->load($route);
    }
    
    public static function exists($route) {
        return $GLOBALS['_route']->exists($route);
    }
    
    public static function to($name) {
        return $GLOBALS['_route']->to($name);
    }
    
}
