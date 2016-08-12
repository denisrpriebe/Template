<?php

require_once '../../app/start.php';

use App\Facades\Components\View;
use App\Facades\Components\Auth;
use App\Facades\Components\Nav;

Auth::guard();

Nav::setActiveTabs(array(
    'dashboard'
));

View::show('pages/auth/dashboard');