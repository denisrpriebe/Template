<?php

namespace App\Facades;

class Database {

    public static function query($sql) {
        return $GLOBALS['_database']->query($sql);
    }

    public static function insert($sql) {
        return $GLOBALS['_database']->insert($sql);
    }

    public static function clean($value) {
        return $GLOBALS['_database']->clean($value);
    }

}
