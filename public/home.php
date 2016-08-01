<?php

require_once '../app/start.php';

use App\Facades\Models\User;

//User::save(array(
//    'id' => '3',
//    'email' => 'gretchen.poster@mnsu.edu',
//    'first_name' => 'Gretchen',
//    'last_name' => 'Poster',
//    'password' => Encryption::hash('45269'),
//    'created_on' => Carbon::now()->toDateTimeString(),
//    'updated_on' => Carbon::now()->toDateTimeString()
//));
//Mail::send(array(
//    'to' => 'denis.priebe@mnsu.edu',
//    'subject' => 'Test Email',
//    'body' => View::make('emails/account-created')
//));

$result = User::where(array(
    array('email', 'LIKE', '%@gmail.com'),
    array('id', '>', '0')
));

echo '<pre>';
var_dump($result);
echo '</pre>';

