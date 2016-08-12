<?php

require_once '../../app/start.php';

use App\Facades\Components\Input;
use App\Facades\Components\Auth;
use App\Facades\Components\Response;
use App\Models\User;

Auth::post();

if (Auth::user()) {
    
    $user = User::where('email', '=', Input::post('email'))->first();
    
    if ($user && $user->id != Auth::user()->id) {

        Response::json(array(
            'valid' => false
        ));
        
    } else {

        Response::json(array(
            'valid' => true
        ));
        
    }
    
} else {

    if (User::where('email', '=', Input::post('email'))->first()) {

        Response::json(array(
            'valid' => false
        ));
        
    } else {

        Response::json(array(
            'valid' => true
        ));
        
    }
}