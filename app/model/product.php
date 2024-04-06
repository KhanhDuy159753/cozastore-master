<?php

namespace App\model;

class Product
{
    private $xl;
    private $id;
    private $name;
    private $img;
    private $price;
    private $view;
    private $bestseller;
    private $category_id;

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

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function getView()
    {
        return $this->view;
    }

    public function setBestseller($bestseller)
    {
        $this->bestseller = $bestseller;
    }

    public function getBestseller()
    {
        return $this->bestseller;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    //load sản phẩm
    public function get_product($limit)
    {
        $this->xl = new Xl_data();
        $sql = "SELECT product.*, category.name as category_name
                FROM product 
                JOIN category ON product.category_id = category.id
                ORDER BY product.id DESC LIMIT " . $limit;
        $result = $this->xl->readitem($sql);
        return $result;
    }

    public function get_one_product($id)
    {
        $this->xl = new Xl_data();
        $sql = "SELECT product.*, category.name as category_name
                FROM product
                JOIN category ON product.category_id = category.id
                WHERE product.id = " . $id;
        $result = $this->xl->readitem($sql);
        return $result;
    }

    public function get_product_sale($limit)
    {
        $this->xl = new Xl_data();
        $sql = "SELECT * FROM product WHERE 1 ORDER BY bestseller DESC LIMIT " . $limit;
        $result = $this->xl->readitem($sql);
        return $result;
    }

    public function get_product_view($limit)
    {
        $this->xl = new Xl_data();
        $sql = "SELECT * FROM product WHERE 1 ORDER BY view DESC LIMIT " . $limit;
        $result = $this->xl->readitem($sql);
        return $result;
    }

    public function add_product($name, $img, $price, $view, $bestseller, $category_id)
    {
        $this->xl = new Xl_data();
        $sql = "INSERT INTO product (name, img, price, view, bestseller, category_id) 
                VALUES (:name, :img, :price, :view, :bestseller, :category_id)";
        $params = [
            ':name' => $name,
            ':img' => basename($img),
            ':price' => $price,
            ':view' => $view,
            ':bestseller' => $bestseller,
            ':category_id' => $category_id,
        ];

        try {
            $this->xl->execute_item($sql, $params);
        } catch (\Exception $e) {
            throw new \Exception("Tạo sản phẩm thāt bài: " . $e->getMessage());
        }
    }

    public function update_product($id, $name, $img, $price, $view, $bestseller, $category_id)
    {
        $this->xl = new Xl_data();
        $sql = "UPDATE product SET name = :name, img = :img, price = :price, view = :view, bestseller = :bestseller, category_id = :category_id WHERE id = :id";
        $params = [
            ':id' => $id,
            ':name' => $name,
            ':img' => basename($img),
            ':price' => $price,
            ':view' => $view,
            ':bestseller' => $bestseller,
            ':category_id' => $category_id,
        ];
        try {
            $this->xl->execute_item($sql, $params);
        } catch (\Exception $e) {
            throw new \Exception("Cập nhật sẽ thāt bài: " . $e->getMessage());
        }
    }

    public function delete_product($id)
    {
        $this->xl = new Xl_data();
        $sql = "DELETE FROM product WHERE id = :id";
        $params = [
            ':id' => $id,
        ];
        try {
            $this->xl->execute_item($sql, $params);
        } catch (\Exception $e) {
            throw new \Exception("Xóa sẽ thāt bài: " . $e->getMessage());
        }
    }

    public function issetImage($id)
    {
        $this->xl = new Xl_data();
        $sql = "SELECT img FROM product WHERE id = " . $id;
        $result = $this->xl->readitem($sql);
        return $result;
    }
}
