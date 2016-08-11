<?php

require_once '../../app/start.php';

use App\Facades\Components\Input;
use App\Facades\Components\Redirect;
use App\Facades\Components\Crypto;
use App\Facades\Components\Session;
use App\Models\User;
use App\Facades\Components\Mail;
use App\Facades\Components\View;
use App\Facades\Components\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

Auth::post();

try {

    $user = User::where('email', '=', Input::post('email'))->firstOrFail();
    
} catch (ModelNotFoundException $ex) {

    Session::flash('alert', array(
        'type' => 'danger',
        'title' => 'Unknown Email',
        'text' => 'The email "' . Input::post('email') . '" is not in our system. Please try a different email or register for a new account.'
    ));

    Redirect::to('/forgot-password.php');
}

$user->password_reset_token = Crypto::passwordResetToken();
$user->password_reset_expires = Carbon::now()->addMinutes(10)->toDateTimeString();

$user->save();

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
