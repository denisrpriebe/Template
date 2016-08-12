<?php

namespace App\Controllers;

use App\Facades\Components\Auth;

abstract class Controller {

    public function __construct(array $route) {
        
        Auth::$route['method']();

        if (array_key_exists('guard', $route)) {
            Auth::$route['guard']();
        }
    }

}
