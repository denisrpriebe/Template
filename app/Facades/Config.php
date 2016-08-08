<?php

namespace App\Facades;

class Config {

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

    public static function mail($name) {
        return $GLOBALS['_configuration']->mail($name);
    }

    public static function authentication($name) {
        return $GLOBALS['_configuration']->authentication($name);
    }
    
    public static function navigation($name) {
        return $GLOBALS['_configuration']->navigation($name);
    }

}
