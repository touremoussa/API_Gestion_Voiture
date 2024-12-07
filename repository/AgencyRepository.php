<?php
require_once 'model/Agency.php';
require_once 'repository/Database.php';

class AgencyRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

   
    public function addAgency(Agency $agency) {
        
        $name = $agency->getName();
        $address = $agency->getAddress();
        $phone = $agency->getPhone();
        $email = $agency->getEmail();
    
       
        $query = "INSERT INTO agencies (name, address, phone, email) VALUES (:name, :address, :phone, :email)";
        $stmt = $this->db->prepare($query);
        
      
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        
       
        $stmt->execute();
        
       
        return $this->db->lastInsertId();
    }

    
    public function getAllAgencies() {
        $query = "SELECT * FROM agencies";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $agencies = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $agencies[] = new Agency($row['id'], $row['name'], $row['address'], $row['phone'], $row['email']);
        }
        return $agencies;
    }

    
    public function getAgencyById($id) {
        $query = "SELECT * FROM agencies WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Agency($row['id'], $row['name'], $row['address'], $row['phone'], $row['email']);
        }
        return null;
    }
}
?>