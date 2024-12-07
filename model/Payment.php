<?php
class Payment {
    private $id;
    private $reservationId;
    private $amount;
    private $paymentMethod;
    private $status;
    private $paymentDate;

    public function __construct($id = null, $reservationId = null, $amount = null, $paymentMethod = null, $status = null, $paymentDate = null) {
        $this->id = $id;
        $this->reservationId = $reservationId;
        $this->amount = $amount;
        $this->paymentMethod = $paymentMethod;
        $this->status = $status;
        $this->paymentDate = $paymentDate;
    }

    
    public function getId() { return $this->id; }
    public function getReservationId() { return $this->reservationId; }
    public function getAmount() { return $this->amount; }
    public function getPaymentMethod() { return $this->paymentMethod; }
    public function getStatus() { return $this->status; }
    public function getPaymentDate() { return $this->paymentDate; }


    public function setId($id) { $this->id = $id; }
    public function setReservationId($reservationId) { $this->reservationId = $reservationId; }
    public function setAmount($amount) { $this->amount = $amount; }
    public function setPaymentMethod($paymentMethod) { $this->paymentMethod = $paymentMethod; }
    public function setStatus($status) { $this->status = $status; }
    public function setPaymentDate($paymentDate) { $this->paymentDate = $paymentDate; }
}
?>