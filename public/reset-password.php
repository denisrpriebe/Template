<?php

require_once '../app/start.php';

use App\Facades\Components\View;
use App\Facades\Components\Input;

View::add('passwordResetToken', Input::get('password_reset_token'));
View::show('pages/reset-password');
