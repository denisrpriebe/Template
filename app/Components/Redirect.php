<?php

namespace App\Components;

use App\Components\Configuration;
use App\Components\Session;

class Redirect {

    protected $public;
    protected $session;

    public function __construct(Configuration $configuration, Session $session) {
        $this->public = $configuration->paths('public');
        $this->session = $session;
    }

    public function to($location) {
        header('Location: ' . $this->public . $location);
        die();
    }

    public function referrer() {
        header('Location: ' . $this->session->previousPage());
        die();
    }

}
