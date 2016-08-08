<?php

require_once '../../app/start.php';

use App\Facades\View;
use App\Facades\Auth;
use App\Facades\Nav;
use App\Facades\DB;

Auth::guard();

//$obj = DB::select('users.*, roles.id roles_id, roles.role')
//        ->from('users')
//        ->join('user_has_roles')
//        ->on('user_has_roles.users_id = users.id')
//        ->join('roles')
//        ->on('roles.id = user_has_roles.roles_id')
//        ->exec();
//
//echo '<pre>';
//var_dump($obj);
//echo '</pre>';
//
//die();

Nav::setActiveTabs(array(
    'home'
));

View::show('pages/auth/home');
