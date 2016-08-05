<?php

require_once '../../app/start.php';

use App\Facades\Input;
use App\Facades\Auth;
use App\Facades\Crypto;
use App\Facades\Redirect;
use App\Facades\Session;

$credentials = array(
    'email' => Input::post('email'),
    'password' => Crypto::hash(Input::post('password'))
);

if (Auth::check($credentials)) {
    
    Redirect::to('/auth/home.php');
    
} else {
    
    Session::flash('alert', array(
        'type' => 'danger',
        'title' => 'Invalid Credentials',
        'text' => 'We do not recognize your username and/or password.'
    ));
    
    Redirect::to('/login.php');
}
