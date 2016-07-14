<?php

namespace App\Core;

use App\Contracts\ComponentContract;

class Application {

    /**
     * Register a component with the application.
     * 
     * @param \App\Contracts\ComponentContract $component
     */
    public function addComponent(ComponentContract $component) {
        $componentKey = $component->getKey();
        $GLOBALS[$componentKey] = $component;
    }

}
