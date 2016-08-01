<?php

namespace App\Models;

use App\Facades\DB;

abstract class Model {

    /**
     * The primary key of the model.
     * 
     * @var string 
     */
    protected $primaryKey = 'id';

    /**
     * The table this model represents.
     * 
     * @var string
     */
    protected $tableName;

    /**
     * Finds and returns a model by the given id.
     * 
     * @param type $id
     * @return type
     */
    public function find($id) {
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE ' . $this->primaryKey . ' = ' . $id;
        return DB::query($sql);
    }

    /**
     * Saves the given model array to the database.
     * 
     * @param array $modelData
     */
    public function save(array $modelData) {

        $columnNames = array();
        $columnValues = array();

        foreach ($modelData as $key => $value) {
            array_push($columnNames, $key);
            array_push($columnValues, "'" . DB::clean($value) . "'");
        }

        $sql = 'INSERT INTO ' . $this->tableName . '(' . implode(', ', $columnNames) . ') VALUES (' . implode(', ', $columnValues) . ')';

        return DB::insert($sql);
    }

    /**
     * Returns all models from the database.
     * 
     * @return type
     */
    public function all() {
        $sql = 'SELECT * FROM ' . $this->tableName;
        return DB::query($sql);
    }

    /**
     * 
     * @param array $conditions
     * @return object|array
     */
    public function where(array $conditions) {

        $conditionsArray = array();

        foreach ($conditions as $condition) {
            $condition[2] = "'" . DB::clean($condition[2]) . "'";
            array_push($conditionsArray, implode(' ', $condition));
        }

        $where = implode(' AND ', $conditionsArray);

        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE ' . $where;
        return DB::query($sql);
    }

    /**
     * Returns the name of the table columns.
     * 
     * @return array
     */
    private function getTableColumnNames() {
        $columnNames = array();
        $tableInfo = $this->getTableInfo();
        foreach ($tableInfo as $table) {
            array_push($columnNames, $table->Field);
        }
        return $columnNames;
    }

    /**
     * Returns information about the table structure.
     * 
     * @return array
     */
    private function getTableInfo() {
        return DB::query('DESCRIBE ' . $this->tableName);
    }

}
