<?php

namespace App\Controllers;

use App\Facades\Components\Auth;
use App\Facades\Components\Flash;
use App\Facades\Components\Redirect;

abstract class Controller {

    public function __construct(array $route, $method) {

        // Protect access to the controller with either GET or POST
        Auth::$route['method']();

        // Protect access to the controller depending on the allowed user roles
        if (array_key_exists('allowed', $route)) {

            Auth::guard();

            if (Auth::userIsAuthorized($route)) {
                $this->$method();
            } else {

                Flash::warning([
                    'title' => 'Whoops!',
                    'text' => 'You do not have sufficient rights to access that content.'
                ]);

                Redirect::route('login-page');
            }
        } else {
            $this->$method();
        }
    }

}
