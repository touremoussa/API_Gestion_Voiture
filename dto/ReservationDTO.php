<?php

class ReservationDTO {
    public $id;
    public $user_id;
    public $vehicle_id;
    public $start_date;
    public $end_date;
    public $status;
    public $total_price;
    public $created_at;

    public function __construct($id, $user_id, $vehicle_id, $start_date, $end_date, $status, $total_price, $created_at) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->vehicle_id = $vehicle_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->status = $status;
        $this->total_price = $total_price;
        $this->created_at = $created_at;
    }
}
?>