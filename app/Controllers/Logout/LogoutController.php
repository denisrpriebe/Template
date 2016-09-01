<?php

namespace App\Controllers\Logout;

use App\Controllers\Controller;
use App\Facades\Components\Auth;
use App\Facades\Components\Flash;
use App\Facades\Components\Redirect;

class LogoutController extends Controller {

    /**
     * Logs out the authenticated user.
     * 
     */
    protected function logout() {

        Auth::logout();

        Flash::info([
            'title' => 'Logged Out',
            'text' => 'You have successfully logged out. See you again soon!'
        ]);

        Redirect::route('login-page');
    }

}
