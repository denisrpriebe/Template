<?php

require_once '../../app/start.php';

use App\Facades\Models\User;
use App\Facades\Crypto;

User::create(array(
    'email' => 'denisrpriebe@gmail.com',
    'first_name' => 'Denis',
    'last_name' => 'Priebe',
    'password' => Crypto::hash('password')
));

User::create(array(
    'email' => 'jim.shnick@aol.com',
    'first_name' => 'Jim',
    'last_name' => 'Shnick',
    'password' => Crypto::hash('12500')
));
