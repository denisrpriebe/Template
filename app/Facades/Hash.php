<?php

namespace App\Facades;

use App\Configurations\Encryption;

class Hash {

    /**
     * Hashes a user's password to be stored in the DB.
     * 
     * @param type $password
     * @return string
     */
    public static function password($password) {
        return sha1(md5(Encryption::$salt . $password . Encryption::$pepper));
    }

}
