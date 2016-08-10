<?php

namespace App\Core;

use App\Models\Model;

class Application {

    public function addComponent($component, $name) {
        $GLOBALS[$name] = $component;
    }

    public function addModel(Model $model, $name) {
        $GLOBALS[$name] = $model;
    }

}
