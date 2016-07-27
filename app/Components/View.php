<?php

namespace App\Components;

use App\Contracts\ComponentContract;

/**
 *
 */
class View extends \Smarty implements ComponentContract {

    /**
     * The views directory.
     *
     * @var string
     */
    protected $views;

    /**
     * The assets directory.
     *
     * @var string
     */
    protected $assets;

    /**
     * Contruct a view object.
     *
     * @param type $views
     * @param type $assets
     */
    public function __construct($settings = array()) {

        parent::__construct();

        $this->setCompileDir('./compiled_views');

        $this->views = $settings['views'];
        $this->assets = $settings['assets'];
    }    

    /**
     * Adds a variable to the view.
     *
     * @param string $name
     * @param mixed $value
     */
    public function add($name, $value) {
        $this->assign($name, $value);
    }

    /**
     * Load an asset to the view.
     *
     * @param type $asset
     * @return type
     */
    public function asset($asset) {
        return $this->assets . '/' . $asset;
    }

    /**
     * Creates and displays a view.
     *
     * @param string $template
     * @return string
     */
    public function show($template) {
        return $this->display($this->views . '/' . $template . '.tpl');
    }

    /**
     * Creates a view.
     *
     * @param type $template
     * @return type
     */
    public function make($template) {
        return $this->fetch($this->views . '/' . $template . '.tpl');
    }

    /**
     * Allow a class to be used within the view.
     *
     * @param string $class
     * @param string $namespace
     */
    public function integrate($class, $namespace) {
        $this->registerClass($class, $namespace);
    }

}
