<?php

require_once '../../../app/start.php';

use App\Facades\Input;
use App\Facades\Redirect;
use App\Facades\Crypto;
use App\Facades\Session;
use App\Facades\Models\User;
use Carbon\Carbon;
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\NestedValidationExceptionInterface;

//$userValidator = Validator::key('email', Validator::email())
//        ->key('first_name', Validator::string()->length(1, 50))
//        ->key('last_name', Validator::string()->length(1, 50))
//        ->key('password', Validator::string()->length(5, 40))
//        ->key('created_on', Validator::date())
//        ->key('updated_on', Validator::date());
//
////$result = $userValidator->validate($user);
//
//try {
//    $userValidator->assert($user);
//} catch (NestedValidationExceptionInterface $exception) {
//    echo $exception->getFullMessage();
//}
//
//die();

User::save(array(
    'id' => 'null',
    'email' => Input::post('email'),
    'first_name' => Input::post('first_name'),
    'last_name' => Input::post('last_name'),
    'password' => Crypto::hash(Input::post('password')),
    'updated_on' => Carbon::now()->toDateTimeString()
));

Session::flash('alert', array(
    'type' => 'success',
    'title' => 'Account Created',
    'text' => 'Your account has been successfully created. Please login below.'
));

Redirect::to('/login.php');
