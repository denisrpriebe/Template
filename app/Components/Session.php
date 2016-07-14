<?php

namespace App\Components;

use App\Contracts\ComponentContract;

class Session implements ComponentContract {

    protected $key;

    public function __construct($sessionName) {

        session_name($sessionName);
        session_start();

        $this->checkFlash();
    }

    public function getKey() {
        return $this->key;
    }

    public function setKey($key) {
        $this->key = $key;
    }

    /**
     * Store a value in the session.
     * 
     * @param string $name
     * @param mixed $object
     */
    public function store($name, $object) {
        $_SESSION[((string) $name)] = serialize($object);
    }

    /**
     * Remove a stored value from the session
     * 
     * @param string $name
     */
    public function remove($name) {
        unset($_SESSION[$name]);
    }

    /**
     * Grab a value from the session.
     * 
     * @param string $name
     * @return mixed
     */
    public function get($name) {
        return isset($_SESSION[$name]) ? unserialize($_SESSION[$name]) : false;
    }

    /**
     * Destory the current session and all of its data.
     * 
     */
    public function destroy() {
        session_destroy();
    }

    /**
     * Flash an object to the session.
     * 
     * @param type $name
     * @param type $object
     */
    public function flash($name, $object) {
        $this->store($name, $object);
        $this->store('_flash', array(
            'name' => $name,
            'time' => 0
        ));
    }

    private function checkFlash() {
        $flash = $this->get('_flash');
        if ($flash) {
            if ($flash['time'] < 1) {
                $flash['time'] ++;
                $this->store('_flash', $flash);
            } else {
                $this->remove($flash['name']);
                $this->remove('_flash');
            }
        }
    }

}
