<?php

namespace App\Models;

use App\Components\Database;

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
    protected $database;
    protected $queryResult;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function __get($name) {
        return $this->queryResult->$name;
    }

    /**
     * Finds and returns a model by the given id.
     *
     * @param type $id
     * @return type
     */
    public function find($id) {
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE ' . $this->primaryKey . ' = ' . $id;
        $this->queryResult = $this->database->query($sql);
        if ($this->queryResult) {
            return $this;
        } else {
            return $this->queryResult;
        }
        
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
            array_push($columnValues, $this->database->clean($value));
        }

        $sql = 'INSERT INTO ' . $this->tableName . '(' . implode(', ', $columnNames) . ') VALUES (' . implode(', ', $columnValues) . ')';

        return $this->database->insertQuery($sql);
    }

    /**
     * Updates a model in the database given the id and the new model data.
     *
     * @param string|int $id
     * @param array $modelData
     * @return boolean
     */
    public function update($id, array $modelData) {

        $setArray = array();

        foreach ($modelData as $key => $value) {
            array_push($setArray, $key . ' = ' . $this->database->clean($value));
        }

        $set = implode(', ', $setArray);

        $sql = 'UPDATE ' . $this->tableName . ' SET ' . $set . ' WHERE ' . $this->primaryKey . ' = ' . $this->database->clean($id);

        return $this->database->updateQuery($sql);
    }

    /**
     * Returns all models from the database.
     *
     * @return type
     */
    public function all() {
        $sql = 'SELECT * FROM ' . $this->tableName;
        return $this->database->query($sql);
    }

    /**
     *
     * @param array $conditions
     * @return object|array
     */
    public function where(array $conditions) {

        $conditionsArray = array();

        foreach ($conditions as $condition) {
            $condition[2] = $this->database->clean($condition[2]);
            array_push($conditionsArray, implode(' ', $condition));
        }

        $where = implode(' AND ', $conditionsArray);

        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE ' . $where;        
        
        $this->queryResult = $this->database->query($sql);
        if ($this->queryResult) {
            return $this;
        } else {
            return $this->queryResult;
        }
    }

    /**
     * This method does not work correctly yet.
     * 
     * @return type
     */
    public function truncate() {
        $sql = 'TRUNCATE ' . $this->tableName . '';
        return $this->database->update($sql);
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
        return $this->database->query('DESCRIBE ' . $this->tableName);
    }
    
    protected function hasMany($model, $foreignKey) {        
        return $model::where(array(
            array($foreignKey, '=', $this->id)
        ));
    }
    
    protected function hasManyPivot($pivot, $pivotKey, $hasManyModel, $modelKey) {
        
        $pivotTable = new $pivot($this->database);        
        
        $pivotRows = $pivotTable->where(array(
            array($pivotKey, '=', $this->id)
        ));
        
        $need = array();
        
        foreach ($pivotRows->queryResult as $pivotRow) {
            $hasManyObject = new $hasManyModel($this->database);
            $newRows = $hasManyObject->where(array(
                array($hasManyObject->primaryKey, '=', $pivotRow->$modelKey)
            ));
            array_push($need, $newRows);
        }
        
        return $need;
        
    }

}
