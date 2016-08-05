<?php

require_once '../../app/start.php';

use App\Facades\Input;
use App\Facades\Redirect;
use App\Facades\Crypto;
use App\Facades\Session;
use App\Facades\Models\User;
use Carbon\Carbon;

$user = User::where(array(
    array('email', '=', Input::post('email'))
));

if (!$user) {
    Session::flash('alert', array(
        'type' => 'danger',
        'title' => 'Unknown Email',
        'text' => 'The email "' . Input::post('email') . '" is not in our system. Please try a different email or register for a new account.'
    ));

    Redirect::to('/forgot-password.php');
}

User::update($user->id, array(
    'password_reset_link' => Crypto::hash(Carbon::now()->toDateTimeString() . uniqid()),
    'password_reset_expires' => Carbon::now()->addMinutes(10)->toDateTimeString(),
    'updated_on' => Carbon::now()->toDateTimeString()
));

// Send email here.

Session::flash('alert', array(
    'type' => 'success',
    'title' => 'Password Reset Email Sent',
    'text' => 'A password reset email has been sent to "' . $user->email . '". Please follow the instructions in this email to reset your password.'
));

Redirect::to('/login.php');
