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
        $GLOBALS['session']->store($name, $object);
    }

    /**
     * Remove a stored value from the session
     * 
     * @param string $name
     */
    public static function remove($name) {
        $GLOBALS['session']->remove($name);
    }

    /**
     * Grab a value from the session.
     * 
     * @param string $name
     * @return mixed
     */
    public static function get($name) {
        return $GLOBALS['session']->get($name);
    }

    /**
     * Destory the current session and all of its data.
     * 
     */
    public static function destroy() {
        $GLOBALS['session']->destroy();
    }

    /**
     * Flash an object to the session.
     * 
     * @param type $name
     * @param type $object
     */
    public static function flash($name, $object) {
        $GLOBALS['session']->flash($name, $object);
    }

}
