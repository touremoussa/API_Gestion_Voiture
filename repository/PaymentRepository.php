<?php
require_once 'model/Payment.php';

class PaymentRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    
    public function createPayment($reservation_id, $amount, $payment_method, $status) {
        $query = "INSERT INTO payments (reservation_id, amount, payment_method, status) 
                  VALUES (:reservation_id, :amount, :payment_method, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':reservation_id', $reservation_id);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

        return $this->db->lastInsertId();  
    }


    public function getAllPayments() {
        $query = "SELECT * FROM payments";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $payments = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $payment = new Payment();
            
            $payment->setId($row['id']);
            $payment->setReservationId($row['reservation_id']);
            $payment->setAmount($row['amount']);
            $payment->setPaymentMethod($row['payment_method']);
            $payment->setStatus($row['status']);
            $payment->setPaymentDate($row['payment_date']);
            
            $payments[] = $payment;
        }
        return $payments;
    }
}
?>