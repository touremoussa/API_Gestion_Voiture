<?php
require_once 'model/User.php';
require_once 'repository/Database.php';

class UserRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    
    public function createUser(User $user) {
        $query = "INSERT INTO users (name, email, phone, password) VALUES (:name, :email, :phone, :password)";
        $stmt = $this->db->prepare($query);

     
        $name = $user->getName();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $password = $user->getPassword();

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);

        $stmt->execute();
        return $this->db->lastInsertId();
    }

  
    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);

        
        $userId = $id;
        $stmt->bindParam(':id', $userId);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new User($row['id'], $row['name'], $row['email'], $row['phone'], $row['password']);
        }
        return null;
    }

    public function updateUser(User $user) {
        $query = "UPDATE users SET name = :name, email = :email, phone = :phone, password = :password WHERE id = :id";
        $stmt = $this->db->prepare($query);
    
        $id = $user->getId();
        $name = $user->getName();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $password = $user->getPassword();
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);
    
        $stmt->execute();
        return $stmt->rowCount(); 
    }
}
?>