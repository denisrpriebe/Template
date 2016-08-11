<?php

require_once '../app/start.php';

use App\Facades\Components\View;
use App\Facades\Components\Auth;

Auth::get();

View::show('pages/forgot-password');
