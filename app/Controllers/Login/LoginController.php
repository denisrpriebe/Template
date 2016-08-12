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
    public function showLogin() {
        View::show('pages/login');
    }

    /**
     * 
     */
    public function doLogin() {

        $credentials = array(
            'email' => Input::post('email'),
            'password' => Crypto::hash(Input::post('password'))
        );

        if (Auth::check($credentials)) {
            
            Redirect::route('auth-dashboard');
            
        } else {

            Session::flash('alert', array(
                'type' => 'danger',
                'title' => 'Invalid Credentials',
                'text' => 'We do not recognize your username and/or password.'
            ));

            Redirect::route('login-page');
        }
    }

}
