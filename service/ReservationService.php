<?php
require_once 'repository/ReservationRepository.php';

class ReservationService {
    private $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    
    public function createReservation($user_id, $vehicle_id, $start_date, $end_date, $total_price) {
        $reservation = new Reservation(null, $user_id, $vehicle_id, $start_date, $end_date, "pending", $total_price);
        return $this->repository->createReservation($reservation);
    }

    
    public function updateReservation($id, $vehicle_id, $start_date, $end_date, $status, $total_price) {
        
        $reservation = new Reservation($id, null, $vehicle_id, $start_date, $end_date, $status, $total_price);
        
      
        return $this->repository->updateReservation($reservation);
    }


    public function deleteReservation($id) {
        return $this->repository->deleteReservation($id);
    }

    
    public function getAllReservations() {
        return $this->repository->findAllReservations();  
    }
}
?>