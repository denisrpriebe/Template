<?php

require_once '../app/start.php';

use App\Facades\Auth;
use App\Facades\Redirect;

Auth::logout();

Redirect::to('/login.php');
