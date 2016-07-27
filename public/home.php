<?php

require_once '../app/start.php';

use App\Facades\Models\User;
use App\Facades\Encryption;
use App\Facades\Input;
use Carbon\Carbon;

//User::save(array(
//    'id' => '3',
//    'email' => 'gretchen.poster@mnsu.edu',
//    'first_name' => 'Gretchen',
//    'last_name' => 'Poster',
//    'password' => Encryption::hash('45269'),
//    'created_on' => Carbon::now()->toDateTimeString(),
//    'updated_on' => Carbon::now()->toDateTimeString()
//));

User::where(array(
    array('id', '>', '1'),
    array('')
));

echo '<pre>';
var_dump(User::where());
echo '</pre>';

