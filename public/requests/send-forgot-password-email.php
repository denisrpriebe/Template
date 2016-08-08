<?php

require_once '../../app/start.php';

use App\Facades\Input;
use App\Facades\Redirect;
use App\Facades\Crypto;
use App\Facades\Session;
use App\Facades\Models\User;
use App\Facades\Mail;
use App\Facades\View;
use Carbon\Carbon;

$userFound = User::where(array(
    array('email', '=', Input::post('email'))
));

if (!$userFound) {

    Session::flash('alert', array(
        'type' => 'danger',
        'title' => 'Unknown Email',
        'text' => 'The email "' . Input::post('email') . '" is not in our system. Please try a different email or register for a new account.'
    ));

    Redirect::to('/forgot-password.php');
}

User::update($userFound->id, array(
    'password_reset_token' => Crypto::passwordResetToken(),
    'password_reset_expires' => Carbon::now()->addMinutes(10)->toDateTimeString(),
    'updated_on' => Carbon::now()->toDateTimeString()
));

// Refresh the user after we made updates
$user = User::find($userFound->id);

View::add('user', $user);

$emailSent = Mail::send(array(
    'to' => $user->email,
    'subject' => 'Template Test Email',
    'body' => View::make('emails/reset-password-email')
));

if ($emailSent) {

    Session::flash('alert', array(
        'type' => 'success',
        'title' => 'Password Reset Email Sent',
        'text' => 'A password reset email has been sent to "' . $user->email . '". Please follow the instructions in this email to reset your password.'
    ));

    Redirect::to('/login.php');
} else {
    
    Session::flash('alert', array(
        'type' => 'danger',
        'title' => 'Email Failure',
        'text' => 'There was a problem trying to send the password reset email.'
    ));

    Redirect::to('/login.php');
}
