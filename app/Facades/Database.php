<?php

namespace App\Facades;

class Database {

    public static function query($sql) {
        return $GLOBALS['database']->query($sql);
    }

}
