<?php

require_once '../../app/start.php';

use App\Facades\View;
use App\Facades\Auth;

Auth::guard();

View::add('user', Auth::user());
View::show('pages/auth/home');