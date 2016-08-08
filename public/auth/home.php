<?php

require_once '../../app/start.php';

use App\Facades\View;
use App\Facades\Auth;
use App\Facades\Nav;

Auth::guard();

Nav::setActiveTabs(array(
    'home'
));

View::show('pages/auth/home');
