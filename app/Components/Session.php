<?php

namespace App\Components;

use App\Components\Configuration;
use App\Components\Input;

class Session {

    protected $pageMethod;

    /**
     * Creates an instance of the session.
     *
     * @param array $settings
     */
    public function __construct(Configuration $configuration, Input $input) {

        session_name($configuration->session('name'));
        session_start();

        // How the current page was accessed. (GET/POST)
        $this->pageMethod = $input->method();

        $this->checkFingerprint();

        $this->checkFlash();

        $this->updateHistory();
    }

    private function checkFingerprint() {

        // Make sure we have a fingerprint set
        if (!$this->has('_fingerprint')) {
            session_regenerate_id(true);
            $this->setFingerprint();
        }

        $fingerprint = $this->get('_fingerprint');

        if ($fingerprint['ip'] !== filter_input(INPUT_SERVER, 'REMOTE_ADDR')) {
            session_regenerate_id(true);
            $this->destroyData();
            $this->setFingerprint();
        }

        // Regenerate session ID every five minutes
        if ($fingerprint['birth'] < (time() - 300)) {
            session_regenerate_id(true);
            $fingerprint['birth'] = time();
        }
    }

    /**
     * Sets/creates the session "fingerprint"
     * 
     */
    private function setFingerprint() {
        $this->store('_fingerprint', array(
            'birth' => time(),
            'ip' => filter_input(INPUT_SERVER, 'REMOTE_ADDR')
        ));
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
        if ($this->pageMethod == 'GET') {
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

    /**
     * 
     */
    private function updateHistory() {
        if ($this->pageMethod == 'GET') {
            $page = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if ($this->has('_history')) {

                $history = $this->get('_history');
                array_push($history, $page);
                $this->store('_history', $history);
            } else {
                $this->store('_history', array($page));
            }
        }
    }

    public function previousPage() {
        $history = $this->get('_history');
        return end($history);
    }

}
