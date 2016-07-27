<?php

namespace App\Facades;

class Encryption {

    public static function hash($value) {
        return $GLOBALS['_encryption']->hash($value);
    }

}
