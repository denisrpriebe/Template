<?php

require_once '../app/start.php';

use App\Facades\View;
use App\Facades\Input;

View::add('passwordResetToken', Input::get('password_reset_token'));
View::show('pages/reset-password');
