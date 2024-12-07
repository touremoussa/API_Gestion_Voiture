<?php

class Vehicle {
    private $id;
    private $make;
    private $model;
    private $price_per_day;
    private $availability_status;
    private $agency_id;

    public function __construct($id = null, $make = null, $model = null, $price_per_day = null, $availability_status = 1, $agency_id = null) {
        $this->id = $id;
        $this->make = $make;
        $this->model = $model;
        $this->price_per_day = $price_per_day;
        $this->availability_status = $availability_status;
        $this->agency_id = $agency_id;
    }

    public function getId() { return $this->id; }
    public function getMake() { return $this->make; }
    public function setMake($make) { $this->make = $make; }
    public function getModel() { return $this->model; }
    public function setModel($model) { $this->model = $model; }
    public function getPricePerDay() { return $this->price_per_day; }
    public function setPricePerDay($price_per_day) { $this->price_per_day = $price_per_day; }
    public function getAvailabilityStatus() { return $this->availability_status; }
    public function setAvailabilityStatus($availability_status) { $this->availability_status = $availability_status; }
    public function getAgencyId() { return $this->agency_id; }
    public function setAgencyId($agency_id) { $this->agency_id = $agency_id; }
}
?>