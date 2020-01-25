<?php
/*
 Title: DatabaseTable Source Code.
 Author: Tom Butler.
 Date: 10-March-2019.
*/

// Provided class allows the use of generic sql queries to the database. Arguments allow to customise queries based on
// what is required.

class DatabaseTable
{
    public $pdo;
    private $table;
    private $primaryKey;

    public function __construct($pdo, $table, $primaryKey)
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function find($field, $value)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);
        return $stmt->fetchAll();
    }

    public function andFind($field1, $field2, $value1, $value2)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field1 . ' = :value1 AND ' .
            $field2 . ' = :value2');
        $criteria = [
            'value1' => $value1,
            'value2' => $value2
        ];
        $stmt->execute($criteria);
        return $stmt->fetchAll();
    }


    public function findAll($condition = "")
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . $condition);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert($record)
    {
        $keys = array_keys($record);
        $values = implode(', ', $keys);
        $valuesWithColon = implode(', :', $keys);
        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($record);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :id');
        $criteria =
            [
                'id' => $id
            ];
        $stmt->execute($criteria);
    }


    public function save($record)
    {
        try {
            $this->insert($record);
        } catch (Exception $e) {
            $this->update($record);
        }
    }

    public function update($record)
    {
        $query = 'UPDATE ' . $this->table . ' SET ';
        $parameters = [];

        foreach ($record as $key => $value) {
            $parameters[] = $key . ' = :' . $key;
        }

        $query .= implode(', ', $parameters);
        $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';
        $record['primaryKey'] = $record[$this->primaryKey];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($record);
    }
}