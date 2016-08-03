<?php

namespace App\Components;

use App\Contracts\ComponentContract;

class Session implements ComponentContract {

    /**
     * Creates an instance of the session.
     *
     * @param array $settings
     */
    public function __construct(array $settings) {

        session_name($settings['name']);
        session_start();

        // Make sure we have a fingerprint set
        if (!isset($_SESSION['_fingerprint'])) {
            session_regenerate_id(true);
            $this->setFingerprint();
        }

        if ($_SESSION['_fingerprint']['ip'] !== filter_input(INPUT_SERVER, 'REMOTE_ADDR')) {
            session_regenerate_id(true);
            $this->destroyData();
            $this->setFingerprint();
        }

        // Regenerate session ID every five minutes:
        if ($_SESSION['_fingerprint']['birth'] < (time() - 300)) {
            session_regenerate_id(true);
            $_SESSION['_fingerprint']['birth'] = time();
        }

        $this->checkFlash();
    }

    /**
     * Sets/creates the session "fingerprint"
     * 
     */
    private function setFingerprint() {
        $_SESSION['_fingerprint'] = array(
            'birth' => time(),
            'ip' => filter_input(INPUT_SERVER, 'REMOTE_ADDR')
        );
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
     * Determine if the session has the given value.
     *
     * @param string $name
     * @return boolean
     */
    public function has($name) {
        return isset($_SESSION[$name]) ? true : false;
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
     * Destroys the current session itself and all of its data.
     *
     */
    public function destroy() {
        session_destroy();
    }

    /**
     * Destroys all data related to the current session but keeps the session
     * itself intact.
     * 
     */
    public function destroyData() {
        foreach (array_keys($_SESSION) as $key) {
            unset($_SESSION[$key]);
        }
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
