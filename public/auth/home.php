<?php

require_once '../../app/start.php';

use App\Facades\View;
use App\Facades\Auth;
use App\Facades\Models\Role;
use App\Facades\Models\User;

Auth::guard();

var_dump(Role::all());

die();

View::add('user', Auth::user());
View::show('pages/auth/home');