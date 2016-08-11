<?php

require_once '../../app/start.php';

use App\Facades\Components\Input;
use App\Models\User;
use App\Facades\Components\Crypto;
use App\Facades\Components\Auth;
use App\Facades\Components\Session;
use App\Facades\Components\Redirect;

Auth::guard();
Auth::post();

$user = User::find(Auth::user()->id);

$newPassword = (Input::post('password') != '__USE_EXISTING__') ? Crypto::hash(Input::post('password')) : false;

if ($newPassword) {
    $user->password = $newPassword;
}

$user->email = Input::post('email');
$user->first_name = Input::post('first_name');
$user->last_name = Input::post('last_name');

$user->save();

Session::flash('alert', array(
    'type' => 'success',
    'title' => 'Settings Updated',
    'text' => 'Your personal settings has been successfully updated.'
));

Redirect::referrer();
