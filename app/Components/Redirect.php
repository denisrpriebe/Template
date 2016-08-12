<?php

namespace App\Components;

use App\Components\Configuration;
use App\Components\Session;
use App\Components\Route;

class Redirect {

    protected $public;
    protected $session;
    protected $route;

    public function __construct(Configuration $configuration, Session $session, Route $route) {
        $this->public = $configuration->paths('public');
        $this->session = $session;
        $this->route = $route;
    }

    public function to($location) {
        header('Location: ' . $this->public . $location);
        die();
    }

    public function referrer() {
        header('Location: ' . $this->session->previousPage());
        die();
    }

    public function route($name) {
        $this->to($this->route->to($name));
    }

}
