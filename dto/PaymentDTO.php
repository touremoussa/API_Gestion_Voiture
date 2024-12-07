<?php

class PaymentDTO {
    public $id;
    public $reservationId;
    public $amount;
    public $paymentMethod;
    public $status;
    public $paymentDate;

    
    public function __construct($id, $reservationId, $amount, $paymentMethod, $status, $paymentDate) {
        $this->id = $id;
        $this->reservationId = $reservationId;
        $this->amount = $amount;
        $this->paymentMethod = $paymentMethod;
        $this->status = $status;
        $this->paymentDate = $paymentDate;
    }

   
    public function getId() {
        return $this->id;
    }

    public function getReservationId() {
        return $this->reservationId;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getPaymentMethod() {
        return $this->paymentMethod;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getPaymentDate() {
        return $this->paymentDate;
    }

    
    public function setId($id) {
        $this->id = $id;
    }

    public function setReservationId($reservationId) {
        $this->reservationId = $reservationId;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setPaymentMethod($paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setPaymentDate($paymentDate) {
        $this->paymentDate = $paymentDate;
    }
}
?>