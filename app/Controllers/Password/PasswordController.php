<?php

namespace App\Controllers\Password;

use App\Controllers\Controller;
use App\Facades\Components\View;

class PasswordController extends Controller {

    public function showForgotPassword() {
        View::show('pages/forgot-password');
    }

}
