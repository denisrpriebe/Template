<?php

namespace App\Facades;

class Model {

    public static function find($id) {
        return $GLOBALS[static::getRegisteredModelName()]->find($id);
    }

    public static function save($modelData) {
        return $GLOBALS[static::getRegisteredModelName()]->save($modelData);
    }

    public static function all() {
        return $GLOBALS[static::getRegisteredModelName()]->all();
    }

    private static function getRegisteredModelName() {
        $class = new \ReflectionClass(get_called_class());
        return '_' . strtolower($class->getShortName());
    }

}
