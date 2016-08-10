<?php

require_once '../../app/start.php';

use App\Facades\Components\Input;
use App\Facades\Components\Redirect;
use App\Facades\Components\Crypto;
use App\Facades\Components\Session;
use App\Facades\Models\User;
use App\Facades\Components\Auth;
use Carbon\Carbon;

Auth::post();

User::save(array(    
    'email' => Input::post('email'),
    'first_name' => Input::post('first_name'),
    'last_name' => Input::post('last_name'),
    'password' => Crypto::hash(Input::post('password')),
    'updated_on' => Carbon::now()->toDateTimeString()
));

Session::flash('alert', array(
    'type' => 'success',
    'title' => 'Account Created',
    'text' => 'Your account has been successfully created. Please login below.'
));

Redirect::to('/login.php');
