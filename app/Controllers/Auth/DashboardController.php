<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Facades\Components\Nav;
use App\Facades\Components\View;

class DashboardController extends Controller {

    /**
     * 
     */
    public function showDashboard() {

        Nav::setActiveTabs([
            'dashboard'
        ]);

        View::show('pages/auth/dashboard');
    }

}
