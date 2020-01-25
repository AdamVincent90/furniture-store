<?php
/**
 * Created by PhpStorm.
 * User: Adam Vincent 16441282
 * Date: 25/02/2019
 * Time: 16:47
 */

// A generic class to store the connection information for the mysql database.

class Connection
{
    private $connect = 'mysql:dbname=furniture;host=127.0.0.1';
    private $username = 'student';
    private $password = 'student';
    private $connection_settings = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    public $pdo;

    public function open()
    {
        try {
            $this->pdo = new PDO($this->connect, $this->username, $this->password, $this->connection_settings);
            return $this->pdo;
        } catch (PDOException $exception) {
            echo 'Connection error: ' . $exception->getMessage();
        }
    }
}
