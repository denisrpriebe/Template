<?php

require_once '../app/start.php';

use App\Models\User;
use App\Models\Role;
use App\Facades\Components\Crypto;

$defaultRole = Role::where('role', '=', 'Default')->first();
$administratorRole = Role::where('role', '=', 'Administrator')->first();

$denis = User::create(array(
    'email' => 'denisrpriebe@gmail.com',
    'first_name' => 'Denis',
    'last_name' => 'Priebe',
    'password' => Crypto::hash('password')
));

$denis->roles()->save($defaultRole);
$denis->roles()->save($administratorRole);
