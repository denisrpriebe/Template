<?php

require_once '../../app/start.php';

use App\Facades\Models\User;
use App\Facades\Crypto;
use Carbon\Carbon;

User::save(array(
    'email' => 'denisrpriebe@gmail.com',
    'first_name' => 'Denis',
    'last_name' => 'Priebe',
    'password' => Crypto::hash('password'),
    'updated_on' => Carbon::now()->toDateTimeString()
));

User::save(array(
    'email' => 'jim.shnick@aol.com',
    'first_name' => 'Jim',
    'last_name' => 'Shnick',
    'password' => Crypto::hash('12500'),
    'updated_on' => Carbon::now()->toDateTimeString()
));
