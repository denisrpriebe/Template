<?php

namespace App\Facades;

/**
 * 
 */
class View {

    /**
     * Adds a variable to the view.
     * 
     * @param string $name
     * @param mixed $value
     */
    public static function add($name, $value) {
        $GLOBALS['view']->add($name, $value);
    }

    /**
     * Load an asset to the view.
     * 
     * @param type $asset
     * @return type
     */
    public static function asset($asset) {
        return $GLOBALS['view']->asset($asset);
    }

    /**
     * Creates and displays a view.
     * 
     * @param string $template
     * @return string
     */
    public static function show($template) {
        return $GLOBALS['view']->show($template);
    }

    /**
     * Creates a view.
     * 
     * @param type $template
     * @return type
     */
    public static function make($template) {
        return $GLOBALS['view']->make($template);
    }

}
