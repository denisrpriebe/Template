<?php

namespace App\Core;

use App\Contracts\ComponentContract;

class Application {

    /**
     * Registers a component with the application.
     * 
     * @param \App\Contracts\ComponentContract $component
     * @param string $name
     */
    public function addComponent(ComponentContract $component, $name) {
        $GLOBALS[$name] = $component;
    }
    
    /**
     * Registers a model with the application.
     * 
     * @param type $model
     * @param string $name
     */
    public function addModel($model, $name) {
        $GLOBALS[$name] = $model;
    }

}
