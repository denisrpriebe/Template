<?php

namespace App\Controllers\Database;

use App\Controllers\Controller;
use App\Facades\Components\Config;
use App\Facades\Components\Redirect;
use App\Facades\Components\Flash;
use App\Models\User;

class DatabaseController extends Controller {

    /**
     * Truncates the database.
     * 
     */
    protected function truncate() {
        User::truncate();
    }

    /**
     * Seeds the database.
     * 
     */
    protected function seed() {

        if (Config::application('environment') != 'development') {

            Flash::warning([
                'title' => 'Production Mode',
                'text' => 'The database could not be seeded because you are not in development mode.'
            ]);

            Redirect::route('login-page');
        }

        // Start Seeds

        require_once '../database/seeds/roles-seeder.php';
        require_once '../database/seeds/users-seeder.php';

        // End Seeds

        Flash::success([
            'title' => 'Database Seeded',
            'text' => 'The database has been successfully seeded.'
        ]);

        Redirect::route('login-page');
    }

}
