<?php

require_once '../../app/start.php';

use App\Facades\Components\View;
use App\Facades\Components\Auth;
use App\Facades\Components\Nav;
use App\Facades\Models\UserRole;

foreach (Auth::user()->roles() as $role) {
    var_dump($role);
}

die();

echo '<pre>';
var_dump(Auth::user()->roles());
echo '</pre>';

die();

Auth::guard();

Nav::setActiveTabs(array(
    'home'
));

View::show('pages/auth/home');
