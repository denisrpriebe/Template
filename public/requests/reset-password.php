<?php

require_once '../../app/start.php';

use App\Facades\Components\Input;
use App\Models\User;
use App\Facades\Components\Crypto;
use App\Facades\Components\Session;
use App\Facades\Components\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Facades\Components\Auth;
use Carbon\Carbon;

Auth::post();

try {

    $user = User::where('password_reset_token', '=', Input::post('password_reset_token'))
            ->firstOrFail();
    
} catch (ModelNotFoundException $ex) {

    Session::flash('alert', array(
        'type' => 'danger',
        'title' => 'Valid Token Required',
        'text' => 'A password reset token was not found or is invalid.'
    ));

    Redirect::to('/forgot-password.php');
}

$passwordExpiresDateTime = Carbon::createFromTimestamp(strtotime($user->password_reset_expires));
$now = Carbon::now();

// Did the user wait too long to reset their password?
if ($passwordExpiresDateTime->lt($now)) {

    Session::flash('alert', array(
        'type' => 'warning',
        'title' => 'Password Reset Expired',
        'text' => 'You password reset session has expired. Please fill out the form below to get a new password reset email.'
    ));

    Redirect::to('/forgot-password.php');
}

$user->password = Crypto::hash(Input::post('password'));
$user->save();

Session::flash('alert', array(
    'type' => 'success',
    'title' => 'Password Reset',
    'text' => 'Your password has been successfully reset. Please login below.'
));

Redirect::to('/login.php');
