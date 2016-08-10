<?php

namespace App\Facades\Components;

/**
 * 
 */
class Redirect {

    public static function to($location) {
        $GLOBALS['_redirect']->to($location);
    }

    public static function referrer() {
        $GLOBALS['_redirect']->referrer();
    }

}
