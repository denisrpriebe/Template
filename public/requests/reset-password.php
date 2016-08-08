<?php

require_once '../../app/start.php';

use App\Facades\Input;
use App\Facades\Models\User;
use App\Facades\Crypto;
use App\Facades\Session;
use App\Facades\Redirect;
use Carbon\Carbon;

$user = User::where(array(
    array('password_reset_token', '=', Input::post('password_reset_token'))
));

// Check to see if the password reset token is valid
if (!$user) {

    Session::flash('alert', array(
        'type' => 'danger',
        'title' => 'Valid Token Required',
        'text' => 'A password reset token was not found or is invalid.'
    ));

    Redirect::to('/forgot-password.php');
}

$passwordExpiresDateTime = Carbon::createFromTimestamp(strtotime($user->password_reset_expires));
$now = Carbon::now();

// The user waited to long to reset their password
if ($passwordExpiresDateTime->lt($now)) {
    
    Session::flash('alert', array(
        'type' => 'warning',
        'title' => 'Password Reset Expired',
        'text' => 'You password reset session has expired. Please fill out the form below to get a new password reset email.'
    ));

    Redirect::to('/forgot-password.php');
}

User::update($user->id, array(
    'password' => Crypto::hash(Input::post('password'))
));

Session::flash('alert', array(
    'type' => 'success',
    'title' => 'Password Reset',
    'text' => 'Your password has been successfully reset. Please login below.'
));

Redirect::to('/login.php');
