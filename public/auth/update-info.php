<?php

require_once '../../app/start.php';

use App\Facades\Components\View;
use App\Facades\Components\Auth;

Auth::guard();

View::add('user', Auth::user());
View::show('pages/auth/update-info');