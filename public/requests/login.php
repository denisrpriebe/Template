<?php

require_once '../../app/start.php';

use App\Facades\Components\Input;
use App\Facades\Components\Auth;
use App\Facades\Components\Crypto;
use App\Facades\Components\Redirect;
use App\Facades\Components\Session;

Auth::post();

$credentials = array(
    'email' => Input::post('email'),
    'password' => Crypto::hash(Input::post('password'))
);

if (Auth::check($credentials)) {
    
    Redirect::to('/auth/dashboard.php');
    
} else {
    
    Session::flash('alert', array(
        'type' => 'danger',
        'title' => 'Invalid Credentials',
        'text' => 'We do not recognize your username and/or password.'
    ));
    
    Redirect::to('/login.php');
}
