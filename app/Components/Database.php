<?php

namespace App\Components;

use App\Components\Configuration;

class Database extends \mysqli {

    protected $sqlString = '';


    /**
     * Creates an instance of the database.
     *
     * @param array $settings
     */
    public function __construct(Configuration $configuration) {
        $this->connect($configuration->database('host'), $configuration->database('username'), $configuration->database('password'), $configuration->database('dbname'));
    }

    /**
     *
     * @param type $sql
     * @return array
     */
    public function query($sql) {

        $data = array();
        $result = parent::query($sql);

        if (!$result) {
            return $data;
        }
        
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
    
    public function select($sql) {
        $this->sqlString .= 'SELECT ' . $sql . ' ';
        return $this;
    }
    
    public function from($sql) {
        $this->sqlString .= 'FROM ' . $sql . ' ';
        return $this;
    }
    
    public function join($sql) {
        $this->sqlString .= 'JOIN ' . $sql . ' ';
        return $this;
    }
    
    public function on($sql) {
        $this->sqlString .= 'ON ' . $sql . ' ';
        return $this;
    }
    
    public function exec() {
        return $this->query($this->sqlString);
    }

}
