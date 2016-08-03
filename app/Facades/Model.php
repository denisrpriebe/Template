<?php

namespace App\Facades;

class Model {

    /**
     * Gets a model from the database by the given id.
     * 
     * @param string|int $id
     * @return object
     */
    public static function find($id) {
        return $GLOBALS[static::getRegisteredModelName()]->find($id);
    }

    public static function save(array $modelData) {
        return $GLOBALS[static::getRegisteredModelName()]->save($modelData);
    }
    
    public static function update($id, array $modelData) {
        return $GLOBALS[static::getRegisteredModelName()]->update($id, $modelData);
    }

    public static function all() {
        return $GLOBALS[static::getRegisteredModelName()]->all();
    }

    public static function where(array $conditions) {
        return $GLOBALS[static::getRegisteredModelName()]->where($conditions);
    }

    private static function getRegisteredModelName() {
        $class = new \ReflectionClass(get_called_class());
        return '_' . strtolower($class->getShortName());
    }

}
