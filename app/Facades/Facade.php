<?php

namespace App\Facades;

abstract class Facade {

    protected static $instanceName;

    public static function __callStatic($name, $arguments) {
        
        $instance = $GLOBALS['app']->getComponent(static::$instanceName);

        if (count($arguments) > 0) {
            return call_user_func_array([$instance, $name], $arguments);
        } else {
            return $instance->$name();
        }
    }

}
