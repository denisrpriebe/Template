<?php

namespace App\Controllers\Database;

use App\Controllers\Controller;
use App\Models\Role;
use App\Facades\Components\Config;
use App\Facades\Components\Redirect;
use App\Facades\Components\Session;

class DatabaseController extends Controller {

    protected function seed() {

        if (Config::application('environment') != 'development') {

            Session::flash('alert', [
                'type' => 'warning',
                'title' => 'Production Mode',
                'text' => 'The database could not be seeded because you are not in development mode.'
            ]);

            Redirect::route('login-page');
        }

        // Start Seeds
        
        Role::create([
            'role' => 'Administrator'
        ]);

        Role::create([
            'role' => 'Default'
        ]);

        // End Seeds
        
        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Database Seeded',
            'text' => 'The database has been successfully seeded.'
        ]);

        Redirect::route('login-page');
    }

}
