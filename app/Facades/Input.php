<?php

namespace App\Facades;

/**
 * 
 */
class Input {

    /**
     * Grab a GET value.
     * 
     * @param string $name
     * @return mixed
     */
    public static function get($name) {
        return filter_input(INPUT_GET, $name);
    }

    /**
     * Grab a POST value.
     * 
     * @param string $name
     * @return mixed
     */
    public static function post($name) {
        return filter_input(INPUT_POST, $name);
    }

    /**
     * The method that was used to access the page.
     * 
     * @return string
     */
    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }

}
