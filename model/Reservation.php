<?php

class Reservation {
    private $id;
    private $user_id;
    private $vehicle_id;
    private $start_date;
    private $end_date;
    private $status;
    private $total_price;
    private $created_at;

    public function __construct($id = null, $user_id = null, $vehicle_id = null, $start_date = null, $end_date = null, $status = "pending", $total_price = 0.0, $created_at = null) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->vehicle_id = $vehicle_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->status = $status;
        $this->total_price = $total_price;
        $this->created_at = $created_at;
    }

 
    public function getId() { return $this->id; }
    public function setId($id) {
        $this->id = $id;
    }
    public function getUserId() { return $this->user_id; }
    public function setUserId($user_id) { $this->user_id = $user_id; }
    public function getVehicleId() { return $this->vehicle_id; }
    public function setVehicleId($vehicle_id) { $this->vehicle_id = $vehicle_id; }
    public function getStartDate() { return $this->start_date; }
    public function setStartDate($start_date) { $this->start_date = $start_date; }
    public function getEndDate() { return $this->end_date; }
    public function setEndDate($end_date) { $this->end_date = $end_date; }
    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }
    public function getTotalPrice() { return $this->total_price; }
    public function setTotalPrice($total_price) { $this->total_price = $total_price; }
    public function getCreatedAt() { return $this->created_at; }
}
?>