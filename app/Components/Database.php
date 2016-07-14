<?php

namespace App\Components;

use App\Contracts\ComponentContract;

class Database extends \mysqli implements ComponentContract {

    protected $key;

    public function __construct($host, $username, $password, $dbname) {
        $this->connect($host, $username, $password, $dbname);
    }

    public function getKey() {
        return $this->key;
    }

    public function setKey($key) {
        $this->key = $key;
    }

    public function query($sql) {

        $data = array();
        $result = parent::query($sql);

        while ($row = $result->fetch_object()) {
            array_push($data, $row);
        }

        return $data;
    }

}
