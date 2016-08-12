<?php

namespace App\Core;

use App\Models\Model;
use App\Components\Configuration;

class Application {

    public function addComponent($component, $name) {
        $GLOBALS[$name] = $component;
    }

    public function addModel(Model $model, $name) {
        $GLOBALS[$name] = $model;
    }

    public function load($page, Configuration $configuration) {
        $route = $configuration->routes($page);
        dd($route);
    }
    
}
