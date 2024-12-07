<?php

class VehicleDTO {
    public $id;
    public $make;
    public $model;
    public $price_per_day;
    public $availability_status;
    public $agency_id;

    public function __construct($id, $make, $model, $price_per_day, $availability_status, $agency_id) {
        $this->id = $id;
        $this->make = $make;
        $this->model = $model;
        $this->price_per_day = $price_per_day;
        $this->availability_status = $availability_status;
        $this->agency_id = $agency_id;
    }
}

?>