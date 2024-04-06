<?php

namespace App\model;

class Category
{
    private $xl;
    private $id;
    private $name;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function get_category($limit)
    {
        $this->xl = new Xl_data();
        $sql = "SELECT * FROM category WHERE 1 ORDER BY id ASC LIMIT " . $limit;
        $result = $this->xl->readitem($sql);
        return $result;
    }

    public function delete_category($id)
    {
        $this->xl = new Xl_data();
        $sql = "DELETE FROM category WHERE id = :id";
        $params = [
            ':id' => $id,
        ];
        $this->xl->execute_item($sql, $params);
    }
}
