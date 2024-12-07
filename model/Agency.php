<?php

class Agency {
    private $id;
    private $name;
    private $address;
    private $phone;
    private $email;

    public function __construct($id = null, $name = null, $address = null, $phone = null, $email = null) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
    }

    
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }
    public function getAddress() { return $this->address; }
    public function setAddress($address) { $this->address = $address; }
    public function getPhone() { return $this->phone; }
    public function setPhone($phone) { $this->phone = $phone; }
    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }
}
?>