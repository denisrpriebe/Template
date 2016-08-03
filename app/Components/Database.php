<?php

namespace App\Components;

use App\Contracts\ComponentContract;

class Database extends \mysqli implements ComponentContract {

    /**
     * Creates an instance of the database.
     *
     * @param array $settings
     */
    public function __construct(array $settings) {
        $this->connect($settings['host'], $settings['username'], $settings['password'], $settings['dbname']);
    }

    /**
     *
     * @param type $sql
     * @return array
     */
    public function query($sql) {

        $data = array();
        $result = parent::query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_object();
        } else if ($result->num_rows > 1) {
            while ($row = $result->fetch_object()) {
                array_push($data, $row);
            }
        }

        return $data;
    }

    public function insert($sql) {
        return parent::query($sql);
    }

    public function update($sql) {
        return parent::query($sql);
    }

    /**
     * Prepares the given value to be inserted into the database.
     * 
     * @param mixed $value
     * @return string
     */
    public function clean($value) {
        return $this->real_escape_string($value);
    }

}
