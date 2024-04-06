<?php

namespace App\model;

class Xl_data extends Database
{
    private $stmt;

    // read data
    function readitem($sql)
    {
        try {
            $this->conn = parent::connection_database();
            $result = $this->conn->query($sql);
            $this->stmt = $result->fetchAll() ?: [];
            return $this->stmt;
        } catch (\PDOException $e) {
            throw new \Exception("Error: " . $e->getMessage());
        }
    }

    // execute data
    function execute_item($sql, $params = [])
    {
        try {
            $this->conn = parent::connection_database();
            $this->stmt = $this->conn->prepare($sql);

            foreach ($params as $key => $value) {
                $this->stmt->bindValue($key, $value);
            }

            $this->stmt->execute();
        } catch (\PDOException $e) {
            throw new \Exception("Error: " . $e->getMessage());
        }
    }
}
