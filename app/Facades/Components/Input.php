<?php

namespace App\Facades\Components;

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
        return $GLOBALS['_input']->get($name);
    }

    /**
     * Grab a POST value.
     * 
     * @param string $name
     * @return mixed
     */
    public static function post($name) {
        return $GLOBALS['_input']->post($name);
    }

    /**
     * Determines if the given value is being passed.
     * 
     * @param type $value
     * @return types
     */
    public static function has($name) {
        return $GLOBALS['_input']->has($name);
    }

    /**
     * The method that was used to access the page.
     * 
     * @return string
     */
    public static function method() {
        return $GLOBALS['_input']->method();
    }

}
