<?php

namespace App\Facades;

/**
 * 
 */
class Redirect {

    public static function to($location) {
        $GLOBALS['_redirect']->to($location);
    }

}
