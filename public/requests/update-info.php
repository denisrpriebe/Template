<?php

require_once '../../../app/start.php';

use App\Facades\Input;
use App\Facades\Models\User;
use App\Facades\Session;
use App\Facades\Redirect;
use Carbon\Carbon;

User::update(Input::post('id'), array(
    'email' => Input::post('email'),
    'first_name' => Input::post('first_name'),
    'last_name' => Input::post('last_name'),
    'updated_on' => Carbon::now()->toDateTimeString()
));

Session::flash('alert', array(
    'type' => 'success',
    'title' => 'Info Updated',
    'text' => 'Your personal information has been successfully updated.'
));

Redirect::to('/auth/home.php');