<?php

namespace App\Controllers\Logout;

use App\Controllers\Controller;
use App\Facades\Components\Auth;
use App\Facades\Components\Session;
use App\Facades\Components\Redirect;

class LogoutController extends Controller {

    /**
     * 
     */
    public function logout() {

        Auth::logout();

        Session::flash('alert', [
            'type' => 'info',
            'title' => 'Logged Out',
            'text' => 'You have successfully logged out. See you again soon!'
        ]);

        Redirect::route('login-page');
    }

}
