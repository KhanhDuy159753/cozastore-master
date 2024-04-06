<?php

namespace App\Model;

class Bill
{
    private $xl;
    private $id;
    private $ordererCode;
    private $iduser;
    private $receiverName;
    private $receiverEmail;
    private $receiverAddress;
    private $receiverTel;
    private $note;
    private $total;
    private $payment;
    private $bookingDate;
    private $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getOrdererCode()
    {
        return $this->ordererCode;
    }

    public function setOrdererCode($ordererCode)
    {
        $this->ordererCode = $ordererCode;
    }

    public function getIduser()
    {
        return $this->iduser;
    }

    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    public function getReceiverName()
    {
        return $this->receiverName;
    }

    public function setReceiverName($receiverName)
    {
        $this->receiverName = $receiverName;
    }

    public function getReceiverEmail()
    {
        return $this->receiverEmail;
    }

    public function setReceiverEmail($receiverEmail)
    {
        $this->receiverEmail = $receiverEmail;
    }
    public function getReceiverAddress()
    {
        return $this->receiverAddress;
    }

    public function setReceiverAddress($receiverAddress)
    {
        $this->receiverAddress = $receiverAddress;
    }

    public function getReceiverTel()
    {
        return $this->receiverTel;
    }

    public function setReceiverTel($receiverTel)
    {
        $this->receiverTel = $receiverTel;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getPayment()
    {
        return $this->payment;
    }

    public function setPayment($payment)
    {
        $this->payment = $payment;
    }

    public function getBookingDate()
    {
        return $this->bookingDate;
    }

    public function setBookingDate($bookingDate)
    {
        $this->bookingDate = $bookingDate;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function __construct()
    {
        $this->xl = new Xl_data();
    }

    public function insert_bill()
    {
        $sql = "INSERT INTO bill (orderer_code, iduser, receiver_name, receiver_email, receiver_address, receiver_tel, receiver_note, total, payment, bookingDate)
                VALUES (:orderer, :iduser, :name, :email, :address, :tel, :note, :total, :payment, :bookingDate)";
        $params = [
            ':orderer' => $this->getOrdererCode(),
            ':iduser' => $this->getIduser(),
            ':name' => $this->getReceiverName(),
            ':email' => $this->getReceiverEmail(),
            ':address' => $this->getReceiverAddress(),
            ':tel' => $this->getReceiverTel(),
            ':note' => $this->getNote(),
            ':total' => $this->getTotal(),
            ':payment' => $this->getPayment(),
            ':bookingDate' => $this->getBookingDate(),
        ];
        try {
            $this->xl->execute_item($sql, $params);
        } catch (\Exception $e) {
            throw new \Exception("Xử lý sẽ thāt bài: " . $e->getMessage());
        }
    }

    public function get_idBill()
    {
        $sql = "SELECT id FROM bill ORDER BY id DESC LIMIT 0,1";
        $result = $this->xl->readitem($sql);
        return $result;
    }

    public function get_one_bill()
    {
        $sql = "SELECT * FROM bill WHERE id = " . $this->getId();
        $result = $this->xl->readitem($sql);
        return $result;
    }

    public function get_all_bill_cart()
    {
        $sql = "SELECT * FROM bill ORDER BY id DESC";
        $result = $this->xl->readitem($sql);
        return $result;
    }
    public function update_status()
    {
        $sql = "UPDATE bill SET status = :status WHERE id = :id";
        $params = [
            ':status' => $this->getStatus(),
            ':id' => $this->getId(),
        ];
        try {
            $this->xl->execute_item($sql, $params);
        } catch (\Exception $e) {
            throw new \Exception("Xử lý sẽ thāt bài: " . $e->getMessage());
        }
    }
}
