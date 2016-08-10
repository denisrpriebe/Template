<?php

namespace App\Facades\Components;

class Crypto {

    public static function hash($value) {
        return $GLOBALS['_encryption']->hash($value);
    }
    
    public static function passwordResetToken() {
        return $GLOBALS['_encryption']->passwordResetToken();
    }

}
