<?php

namespace App\Controllers\Register;

use App\Controllers\Controller;
use App\Facades\Components\View;

class RegistrationController extends Controller {

    public function showRegistration() {
        View::show('pages/register');
    }

}
