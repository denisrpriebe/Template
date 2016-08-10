<?php

require_once '../../app/start.php';

use App\Facades\Components\View;
use App\Facades\Components\Auth;
use App\Facades\Components\Nav;
use App\Facades\Models\User;

Auth::guard();

Nav::setActiveTabs(array(
    'home'
));

View::show('pages/auth/home');
