<?php

namespace App\Controllers\Registration;

use App\Controllers\Controller;
use App\Facades\Components\View;
use App\Facades\Components\Input;
use App\Facades\Components\Redirect;
use App\Facades\Components\Crypto;
use App\Facades\Components\Session;
use App\Models\User;
use App\Models\Role;

class RegistrationController extends Controller {

    /**
     * Shows the registration page.
     * 
     */
    protected function show() {
        View::show('pages/register');
    }

    /**
     * Registers a new user.
     * 
     */
    protected function register() {
        $defaultRole = Role::where('role', '=', 'Default')->first();

        // check if a user already exists with the same email
        if (User::where('email', '=', Input::post('email'))->first()) {

            Session::flash('alert', [
                'type' => 'warning',
                'title' => 'Email Account Exists',
                'text' => 'An account with the email ' . Input::post('email') . ' already exists. Please login or register with a new email.'
            ]);

            Redirect::route('registration-page');
        }

        $user = new User;
        $user->email = Input::post('email');
        $user->first_name = Input::post('first_name');
        $user->last_name = Input::post('last_name');
        $user->password = Crypto::hash(Input::post('password'));
        $user->save();

        // assign user the "default" role
        $user->roles()->save($defaultRole);

        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Account Created',
            'text' => 'Your account has been successfully created. Please login.'
        ]);

        Redirect::route('login-page');
    }

}
