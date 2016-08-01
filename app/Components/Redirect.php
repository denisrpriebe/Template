<?php

namespace App\Components;

use App\Contracts\ComponentContract;

class Redirect implements ComponentContract {

    protected $public;

    public function __construct(array $settings) {
        $this->public = $settings['public'];
    }
    
    public function to($location) {
        header('Location: ' . $this->public . $location);
        die();
    }

}
