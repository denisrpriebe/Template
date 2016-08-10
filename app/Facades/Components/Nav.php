<?php

namespace App\Facades\Components;

class Nav {

    public static function nav() {
        return $GLOBALS['_navigation']->nav();
    }

    public static function setActiveTabs(array $names) {
        return $GLOBALS['_navigation']->setActiveTabs($names);
    }
    
    public static function getActiveTabs() {
        return $GLOBALS['_navigation']->getActiveTabs();
    }

}
