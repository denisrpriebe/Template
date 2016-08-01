<?php

namespace App\Facades;

class Auth {

    public static function check(array $credentials) {
        return $GLOBALS['_authentication']->check($credentials);
    }

    public static function user() {
        return $GLOBALS['_authentication']->user();
    }

    public static function logout() {
        $GLOBALS['_authentication']->logout();
    }

    public static function guard() {
        $GLOBALS['_authentication']->guard();
    }

}
