<?php

require_once '../app/start.php';

use App\Facades\Components\Auth;
use App\Facades\Components\Redirect;
use App\Facades\Components\Session;

Auth::logout();

Session::flash('alert', array(
    'type' => 'info',
    'title' => 'Logged Out',
    'text' => 'You have successfully logged out. See you again soon!'
));

Redirect::to('/login.php');
