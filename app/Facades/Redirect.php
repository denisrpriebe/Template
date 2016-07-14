<?php

namespace App\Facades;

/**
 * 
 */
class Redirect {

    public static function to($location) {
        header('Location: ' . $location);
        die();
    }

}
