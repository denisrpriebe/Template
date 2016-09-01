<?php

namespace App\Controllers\Login;

use App\Controllers\Controller;
use App\Facades\Components\View;
use App\Facades\Components\Input;
use App\Facades\Components\Flash;
use App\Facades\Components\Redirect;
use App\Facades\Components\Crypto;
use App\Facades\Components\Auth;
use App\Facades\Components\Validator;
use App\Validators\LoginValidator;

class LoginController extends Controller {

    /**
     * Shows the login page.
     *
     */
    protected function show() {
        View::show('pages/login');
    }

    /**
     * Attempts to login the user.
     *
     */
    protected function login() {

        Validator::run(new LoginValidator);

        $credentials = [
            'email' => Input::post('email'),
            'password' => Crypto::hash(Input::post('password'))
        ];

        if (Auth::check($credentials)) {
            Redirect::route('dashboard-page');
        }

        Flash::error([
            'title' => 'Invalid Credentials',
            'text' => 'We do not recognize your username and/or password.'
        ]);

        Redirect::route('login-page');
    }

}
