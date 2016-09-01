<?php

namespace App\Core;

class Application {

    /**
     * The application components.
     *
     * @var array
     */
    protected $components = [];

    /**
     * Adds a new component to the application.
     *
     * @param mixed $component
     * @param string $name
     */
    public function addComponent($component, $name) {
        $this->components[$name] = $component;
    }

    /**
     * Returns the specified component.
     *
     * @param string $name
     * @return mixed
     */
    public function getComponent($name) {
        return $this->components[$name];
    }

}
