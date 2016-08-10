<?php

namespace App\Components;

use App\Components\Configuration;

class Navigation {

    protected $nav;
    protected $activeTabs;

    public function __construct(Configuration $configuration) {
        $this->nav = $configuration->navigation('nav');
    }

    public function nav() {
        return $this->nav;
    }

    public function setActiveTabs(array $names) {
        $this->activeTabs = $names;
    }

    public function getActiveTabs() {
        return $this->activeTabs;
    }

}
