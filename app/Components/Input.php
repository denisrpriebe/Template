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
        return filter_input(INPUT_SERVER, 'REQUEST_METHOD');
    }

    public function url($part = null) {
        $url = parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI'));
        return $part ? $url[$part] : $url;
    }

    /**
     * Returns the current route.
     * 
     * @return string
     */
    public function route() {
        $url = parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI'));
        parse_str($url['query'], $values);
        return array_keys($values)[0];
    }

}
