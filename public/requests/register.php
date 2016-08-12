<?php

require_once '../../app/start.php';

use App\Facades\Components\Input;
use App\Facades\Components\Redirect;
use App\Facades\Components\Crypto;
use App\Facades\Components\Session;
use App\Facades\Components\Auth;
use App\Models\User;
use App\Models\Role;

Auth::post();

$defaultRole = Role::where('role', '=', 'Default')->first();

// check if a user already exists with the same email
if (User::where('email', '=', Input::post('email'))->first()) {

    Session::flash('alert', array(
        'type' => 'warning',
        'title' => 'Email Account Exists',
        'text' => 'An account with the email "' . Input::post('email') . '" already exists. Please login or register with a new email.'
    ));

    Redirect::to('/register.php');
}

$user = new User;
$user->email = Input::post('email');
$user->first_name = Input::post('first_name');
$user->last_name = Input::post('last_name');
$user->password = Crypto::hash(Input::post('password'));
$user->save();

// assign the new user to the "default" group
$user->roles()->save($defaultRole);

Session::flash('alert', array(
    'type' => 'success',
    'title' => 'Account Created',
    'text' => 'Your account has been successfully created. Please login below.'
));

Redirect::to('/login.php');
