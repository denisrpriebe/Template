<?php

namespace App\Bootstrap;

use App\Facades\Components\View;

class GlobalView {

    /**
     * If you need to make a variable accessable by all views, then you may add
     * it here.
     * 
     */
    public function bootData() {

        View::add('globalVar', 'Hello World!');
    }

}
