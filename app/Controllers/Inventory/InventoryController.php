<?php

namespace App\Controllers\Inventory;

use App\Controllers\Controller;
use App\Facades\Components\View;
use App\Facades\Components\Nav;

class InventoryController extends Controller {

    /**
     * Show the inventory page.
     * 
     */
    public function show() {
        Nav::setActiveTabs(['inventory']);
        View::show('pages/auth/inventory');
    }

}
