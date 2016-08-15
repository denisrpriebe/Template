<?php

require_once '../app/start.php';

use App\Facades\Components\Input;
use App\Facades\Components\Route;
use App\Facades\Components\View;

$route = Input::route();

if (Route::exists($route)) {
    Route::load($route);
} else {
    View::show('not-found');
}
