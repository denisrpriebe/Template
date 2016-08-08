<?php

require_once '../../app/start.php';

use App\Facades\Models\Role;

Role::truncate();

Role::save(array(
    'id' => '1',
    'role' => 'Administrator'
));

Role::save(array(
    'id' => '2',
    'role' => 'Default'
));
