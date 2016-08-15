<?php

namespace App\Controllers\Inventory;

use App\Controllers\Controller;
use App\Facades\Components\View;
use App\Facades\Components\Nav;

class InventoryController extends Controller {
    
    public function showInventory() {
        
        Nav::setActiveTabs(['inventory']);
        
        View::show('pages/auth/inventory');
    }
    
}
