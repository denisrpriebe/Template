<?php

namespace App\Components;

use App\Contracts\ComponentContract;

class Configuration implements ComponentContract {

    protected $configurations;

    public function __construct($configurations = array()) {
        $this->configurations = $configurations;
    }

    public function paths($name) {
        return $this->configurations['paths'][$name];
    }

    public function session($name) {
        return $this->configurations['session'][$name];
    }

    public function database($name) {
        return $this->configurations['database'][$name];
    }

    public function encryption($name) {
        return $this->configurations['encryption'][$name];
    }

}
