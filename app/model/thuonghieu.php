<?php

namespace App\Model;

class thuonghieu
{
    private $xl;
    public $id = 0;
    public $ten = '';
    public $hinhanh = '';
    public function getId()
    {
        return $this->id;
    }
    public function getTen()
    {
        return $this->ten;
    }
    public function getHinhanh()
    {
        return $this->hinhanh;
    }
    public function __construct($id, $ten, $hinhanh)
    {
        $this->xl = new Xl_data();
        $this->id = $id;
        $this->ten = $ten;
        $this->hinhanh = $hinhanh;
    }
    public function getall_thuonghieu()
    {
        $sql = "SELECT * FROM thuonghieu";
        $result = $this->xl->readitem($sql);
        return $result;
    }
    public function hienthi()
    {
        echo '
            <ul>
                <li>' . $this->id . '</li>
                <li>' . $this->ten . '</li>
                <li>' . $this->hinhanh . '</li>
            </ul>
        ';
    }
}
