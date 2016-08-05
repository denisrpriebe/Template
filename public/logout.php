<?php

require_once '../app/start.php';

use App\Facades\Auth;
use App\Facades\Redirect;
use App\Facades\Session;

Auth::logout();

Session::flash('alert', array(
    'type' => 'info',
    'title' => 'Logged Out',
    'text' => 'You have successfully logged out. See you again soon!'
));

Redirect::to('/login.php');
