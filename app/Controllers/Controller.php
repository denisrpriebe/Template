<?php

namespace App\Controllers;

use App\Facades\Components\Auth;

abstract class Controller {

    public function __construct(array $route, $method) {
        
        // Protect access to the controller with either GET or POST
        Auth::$route['method']();

        // Activate the guard if there is one
        if (array_key_exists('guard', $route)) {
            Auth::$route['guard']();
        }
        
        // Call the controller's method
        $this->$method();
    }

}
