<?php

namespace App\Facades;

class Configuration {

    public static function paths($name) {
        return $GLOBALS['_configuration']->paths($name);
    }

    public static function database($name) {
        return $GLOBALS['_configuration']->database($name);
    }

    public static function session($name) {
        return $GLOBALS['_configuration']->session($name);
    }

    public static function encryption($name) {
        return $GLOBALS['_configuration']->encryption($name);
    }

}
