<?php

namespace App\model;

use PDO;
use PDOException;

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $databasename = "cozastore-master";
    protected $conn;

    function connection_database()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->servername . ";dbname=" . $this->databasename,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Kết nối thành công";
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
