<?php

namespace App\Facades;

/**
 * 
 */
class Session {

    /**
     * Store a value in the session.
     * 
     * @param string $name
     * @param mixed $object
     */
    public static function store($name, $object) {
        $GLOBALS['_session']->store($name, $object);
    }

    /**
     * Remove a stored value from the session
     * 
     * @param string $name
     */
    public static function remove($name) {
        $GLOBALS['_session']->remove($name);
    }

    /**
     * Grab a value from the session.
     * 
     * @param string $name
     * @return mixed
     */
    public static function get($name) {
        return $GLOBALS['_session']->get($name);
    }

    /**
     * Determines if the session has the given value.
     * 
     * @param string $name
     * @return boolean
     */
    public static function has($name) {
        return $GLOBALS['_session']->has($name);
    }
    
    /**
     * Destory the current session and all of its data.
     * 
     */
    public static function destroy() {
        $GLOBALS['_session']->destroy();
    }

    /**
     * Flash an object to the session.
     * 
     * @param type $name
     * @param type $object
     */
    public static function flash($name, $object) {
        $GLOBALS['_session']->flash($name, $object);
    }

}
