<?php

namespace App\Controllers\Login;

use App\Controllers\Controller;
use App\Facades\Components\View;
use App\Facades\Components\Input;
use App\Facades\Components\Session;
use App\Facades\Components\Redirect;
use App\Facades\Components\Crypto;
use App\Facades\Components\Auth;

class LoginController extends Controller {

    /**
     * 
     */
    protected function showLogin() {
        View::show('pages/login');
    }

    /**
     * 
     */
    protected function doLogin() {

        $credentials = [
            'email' => Input::post('email'),
            'password' => Crypto::hash(Input::post('password'))
        ];

        if (Auth::check($credentials)) {
            Redirect::route('auth-dashboard-page');
        }

        Session::flash('alert', [
            'type' => 'danger',
            'title' => 'Invalid Credentials',
            'text' => 'We do not recognize your username and/or password.'
        ]);

        Redirect::route('login-page');
    }

}
