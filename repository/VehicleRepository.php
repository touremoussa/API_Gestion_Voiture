<?php
require_once 'model/Vehicle.php';
require_once 'repository/Database.php';

class VehicleRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    
    public function addVehicle(Vehicle $vehicle) {
        
        $make = $vehicle->getMake();
        $model = $vehicle->getModel();
        $price_per_day = $vehicle->getPricePerDay();
        $availability_status = $vehicle->getAvailabilityStatus();
        $agency_id = $vehicle->getAgencyId();
    
        $query = "INSERT INTO vehicles (make, model, price_per_day, availability_status, agency_id) 
                  VALUES (:make, :model, :price_per_day, :availability_status, :agency_id)";
        $stmt = $this->db->prepare($query);
    
      
        $stmt->bindParam(':make', $make);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':price_per_day', $price_per_day);
        $stmt->bindParam(':availability_status', $availability_status);
        $stmt->bindParam(':agency_id', $agency_id);
    
      
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    
    public function updateVehicle(Vehicle $vehicle) {
        $query = "UPDATE vehicles SET make = :make, model = :model, price_per_day = :price_per_day, availability_status = :availability_status, agency_id = :agency_id WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $vehicle->getId());
        $stmt->bindParam(':make', $vehicle->getMake());
        $stmt->bindParam(':model', $vehicle->getModel());
        $stmt->bindParam(':price_per_day', $vehicle->getPricePerDay());
        $stmt->bindParam(':availability_status', $vehicle->getAvailabilityStatus());
        $stmt->bindParam(':agency_id', $vehicle->getAgencyId());
        $stmt->execute();
        return $stmt->rowCount();
    }

    
    public function deleteVehicle($id) {
        $query = "DELETE FROM vehicles WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAvailableVehicles() {
        $query = "SELECT * FROM vehicles WHERE availability_status <> 0";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $vehicles = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vehicles[] = new Vehicle($row['id'], $row['make'], $row['model'], $row['price_per_day'], $row['availability_status'], $row['agency_id']);
        }
        return $vehicles;
    }
}
?>