<?php

namespace App\Controllers\Database;

use App\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

class DatabaseController extends Controller {

    public function seed() {

        Role::create([
            'role' => 'Administrator'
        ]);

        Role::create([
            'role' => 'Default'
        ]);
    }

}
