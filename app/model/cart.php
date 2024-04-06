<?php

namespace App\Model;

class Cart
{
    private $xl;
    private $id;
    private $idpro;
    private $name;
    private $img = "";
    private $price;
    private $quantity;
    private $intoMoney;
    private $idbill;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdpro()
    {
        return $this->idpro;
    }

    public function setIdpro($idpro)
    {
        $this->idpro = $idpro;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getIntoMoney()
    {
        return $this->intoMoney;
    }

    public function setIntoMoney($intoMoney)
    {
        $this->intoMoney = $intoMoney;
    }

    public function getIdbill()
    {
        return $this->idbill;
    }

    public function setIdbill($idbill)
    {
        $this->idbill = $idbill;
    }

    public function __construct()
    {
        $this->xl = new Xl_data();
    }

    public function checkcart($id)
    {
        foreach ($_SESSION['cart'] as $i => $product) {
            if ($product['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    public function insert_cart()
    {
        $sql = "INSERT INTO cart(idpro, name, img, price, quantity, into_money, idbill) 
                VALUES(:idpro, :name, COALESCE(:img, ''), :price, :quantity, :intoMoney, :idbill)";

        $params = [
            ':idpro' => $this->getIdpro(),
            ':name' => $this->getName(),
            ':img' => $this->getImg(),
            ':price' => $this->getPrice(),
            ':quantity' => $this->getQuantity(),
            ':intoMoney' => $this->getIntoMoney(),
            ':idbill' => $this->getIdbill(),
        ];
        print_r($params);
        try {
            $this->xl->execute_item($sql, $params);
        } catch (\Exception $e) {
            throw new \Exception("Tạo cart thāt bài: " . $e->getMessage());
        }
    }
}
