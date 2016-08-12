<?php

namespace App\Components;

class Configuration {

    /**
     * An array of file configurations.
     * 
     * @var array 
     */
    protected $configurations;

    /**
     * Initialize a new instance of our configuration.
     * 
     * @param array $configurations
     */
    public function __construct(array $configurations) {
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

    public function mail($name) {
        return $this->configurations['mail'][$name];
    }

    public function authentication($name) {
        return $this->configurations['authentication'][$name];
    }
    
    public function navigation($name) {
        return $this->configurations['navigation'][$name];
    }
    
    public function application($name) {
        return $this->configurations['application'][$name];
    }
    
    public function routes() {
        return $this->configurations['routes'];
    }

}
