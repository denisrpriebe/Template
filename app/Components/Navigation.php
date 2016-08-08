<?php

namespace App\Components;

use App\Contracts\ComponentContract;

class Navigation implements ComponentContract {

    protected $nav;
    protected $activeTabs;

    public function __construct(array $settings) {
        $this->nav = $settings;
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
