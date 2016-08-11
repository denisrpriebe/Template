<?php

require_once '../../app/start.php';

use App\Models\Role;

Role::create(array(
    'role' => 'Administrator'
));

Role::create(array(
    'role' => 'Default'
));
