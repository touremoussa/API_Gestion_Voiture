<?php
require_once 'model/Reservation.php';

class ReservationRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    
    public function createReservation(Reservation $reservation) {
        $query = "INSERT INTO reservations (user_id, vehicle_id, start_date, end_date, status, total_price) 
                  VALUES (:user_id, :vehicle_id, :start_date, :end_date, :status, :total_price)";
        $stmt = $this->db->prepare($query);
    
        
        $user_id = $reservation->getUserId();
        $vehicle_id = $reservation->getVehicleId();
        $start_date = $reservation->getStartDate();
        $end_date = $reservation->getEndDate();
        $status = $reservation->getStatus();
        $total_price = $reservation->getTotalPrice();
    
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':vehicle_id', $vehicle_id);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':total_price', $total_price);
    
        $stmt->execute();
    
        return $this->db->lastInsertId();
    }

    
    public function updateReservation($reservation) {
        
        $id = $reservation->getId();
        $vehicle_id = $reservation->getVehicleId();
        $start_date = $reservation->getStartDate();
        $end_date = $reservation->getEndDate();
        $status = $reservation->getStatus();
        $total_price = $reservation->getTotalPrice();
    
        
        $query = "UPDATE reservations SET vehicle_id = :vehicle_id, start_date = :start_date, end_date = :end_date, status = :status, total_price = :total_price WHERE id = :id";
    
       
        $stmt = $this->db->prepare($query);
    
      
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':vehicle_id', $vehicle_id);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':total_price', $total_price);
    
       
        if ($stmt->execute()) {
            return $stmt->rowCount(); 
        }
    
        return 0;
    }
   
    public function deleteReservation($id) {
        $query = "DELETE FROM reservations WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function findAllReservations() {
        $query = "SELECT * FROM reservations";  
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $reservations = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           
            $reservation = new Reservation(
                $row['id'],
                $row['user_id'],
                $row['vehicle_id'],
                $row['start_date'],
                $row['end_date'],
                $row['status'],
                $row['total_price'],
                $row['created_at']
            );
            $reservations[] = $reservation;
        }

        return $reservations;  
    }
}
?>