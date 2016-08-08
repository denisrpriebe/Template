<?php

namespace App\Facades;

class Mail {
    
    public static function send(array $email) {
        return $GLOBALS['_mail']->sendEmail($email);
    }
    
}
