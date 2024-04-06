<?php

namespace App\Model;

class NhaXuatBan
{
    private $id;
    private $ten;
    private $hinhAnh;

    public function __construct($id, $ten, $hinhAnh)
    {
        $this->id = $id;
        $this->ten = $ten;
        $this->hinhAnh = $hinhAnh;
    }

    public function hienThi()
    {
        echo "<ul>";
        echo "<li>ID: " . $this->id . "</li>";
        echo "<li>Tên: " . $this->ten . "</li>";
        echo "<li>Hình ảnh: " . $this->hinhAnh . "</li>";
        echo "</ul>";
    }
}
