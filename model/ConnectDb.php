<?php
namespace model;
use Exception;
class ConnectDb {
    
    public function createConnection () {
        $servername = "localhost";
        $dbName = "id7092621_lab2";
        $username = "id7092621_karl";
        $password = "hejsan123";
        try {
            echo "Connected successfully"; 
            return $conn = new \PDO("mysql:host=$servername;dbname=$dbName;", $username, $password);
            // set the PDO error mode to exception
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
    }
}
}