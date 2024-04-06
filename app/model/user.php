<?php

namespace App\model;

class User
{
    private $xl;
    private $id;
    private $username;
    private $password;
    private $firstname;
    private $lastname;
    private $img;
    private $address;
    private $email;
    private $phone;
    private $role;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function get_all_user()
    {
        $this->xl = new Xl_data();
        $sql = "SELECT * FROM user ORDER BY id DESC";
        $result = $this->xl->readitem($sql);
        return $result;
    }

    public function get_user()
    {
        $this->xl = new Xl_data();
        $sql = "SELECT DISTINCT * 
                FROM user 
                WHERE username = '" . $this->getUsername() . "'";
        $result = $this->xl->readitem($sql);
        return $result;
    }

    public function register()
    {
        $this->xl = new Xl_data();
        if ($this->isUserExist()) {
            throw new \Exception("Tạo tài khoản thất bại: Người dùng đã tồn tại.");
        }
        $sql = "INSERT INTO user (username, lastname, email, phone, address, password) 
                VALUES (:username, :lastname, :email, :phone, :address, :password)";

        $params = [
            ':username' => $this->getUsername(),
            ':lastname' => $this->getLastname(),
            ':email' => $this->getEmail(),
            ':phone' => $this->getPhone(),
            ':address' => $this->getAddress(),
            ':password' => $this->getPassword(),
        ];

        $this->xl->execute_item($sql, $params);
    }

    private function isUserExist()
    {
        $sql = "SELECT COUNT(*) FROM user WHERE username = '" . $this->getUsername() . "'";
        $result = $this->xl->readitem($sql);
        return ($result[0]['COUNT(*)'] > 0);
    }

    public function checkuser_mail()
    {
        $this->xl = new Xl_data();
        $sql = "SELECT * FROM user WHERE username = '" . $this->getUsername() . "' AND email = '" . $this->getEmail() . "'";
        $result = $this->xl->readitem($sql);
        return $result;
    }

    public function updateProfile($username, $firstname, $lastname, $email, $phone, $address, $img_path)
    {
        $this->xl = new Xl_data();

        $sql = "UPDATE user 
                SET username = :username, firstname = :firstname, lastname = :lastname, 
                phone = :phone, email = :email, address = :address, img = :img_path 
                WHERE id = :id";

        $params = [
            ':id' => $this->getId(),
            ':username' => $username,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':phone' => $phone,
            ':address' => $address,
            ':img_path' => basename($img_path),
        ];

        try {
            $this->xl->execute_item($sql, $params);
        } catch (\Exception $e) {
            throw new \Exception("Cập nhật thông tin hồ sơ thất bại: " . $e->getMessage());
        }
    }
}
