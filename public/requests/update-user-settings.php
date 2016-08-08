<?php

require_once '../../app/start.php';

use App\Facades\Input;
use App\Facades\Models\User;
use App\Facades\Crypto;
use App\Facades\Auth;
use App\Facades\Session;
use App\Facades\Redirect;
use Carbon\Carbon;

$userUpdated = false;
$newPassword = (Input::post('password') != '__USE_EXISTING__') ? Crypto::hash(Input::post('password')) : false;

if ($newPassword) {
    
    $userUpdated = User::update(Auth::user()->id, array(
        'email' => Input::post('email'),
        'first_name' => Input::post('first_name'),
        'last_name' => Input::post('last_name'),
        'password' => $newPassword,
        'updated_on' => Carbon::now()->toDateTimeString()
    ));
    
} else {
    
    $userUpdated = User::update(Auth::user()->id, array(
        'email' => Input::post('email'),
        'first_name' => Input::post('first_name'),
        'last_name' => Input::post('last_name'),
        'updated_on' => Carbon::now()->toDateTimeString()
    ));
    
}

if ($userUpdated) {
    
    Session::flash('alert', array(
        'type' => 'success',
        'title' => 'Settings Updated',
        'text' => 'Your personal settings has been successfully updated.'
    ));
    
} else {
    
    Session::flash('alert', array(
        'type' => 'danger',
        'title' => 'Update Error',
        'text' => 'There was a problem trying to update your personal settings.'
    ));
    
}

Redirect::to('/auth/home.php');