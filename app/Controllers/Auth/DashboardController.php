<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Facades\Components\Nav;
use App\Facades\Components\View;

class DashboardController extends Controller {

    /**
     * Shows the dashboard page.
     * 
     */
    protected function show() {
        Nav::setActiveTabs(['dashboard']);
        View::show('pages/auth/dashboard');
    }

}
