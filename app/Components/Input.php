<?php

namespace App\Components;

class Input {

    /**
     * Returns a GET value by the given name.
     * 
     * @param string $name
     * @return mixed
     */
    public function get($name) {
        return filter_input(INPUT_GET, $name);
    }

    /**
     * Returns a POST value by the given name.
     * 
     * @param string $name
     * @return mixed
     */
    public function post($name) {
        return filter_input(INPUT_POST, $name);
    }

    /**
     * Determines if the given value is being passed.
     * 
     * @param type $value
     * @return types
     */
    public function has($name) {
        return ($this->get($value) || $this->post($value)) ? true : false;
    }

    /**
     * Determines what method was used to access the page.
     * 
     * @return type
     */
    public function method() {
        return $_SERVER['REQUEST_METHOD'];
    }

}
