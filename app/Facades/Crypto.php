<?php

namespace App\Facades;

class Crypto {

    public static function hash($value) {
        return $GLOBALS['_encryption']->hash($value);
    }

}
