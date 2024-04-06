<?php

namespace App\Model;

class TheLoai
{
    private $xl;
    private $id;
    private $ten;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getTen()
    {
        return $this->ten;
    }
    public function setTen($ten)
    {
        $this->ten = $ten;
    }
    public function __construct()
    {
        $this->xl = new Xl_data();
    }
    public function getAllTheLoai()
    {
        $sql = "SELECT * FROM category";
        $result = $this->xl->readitem($sql);
        return $result;
    }
}
