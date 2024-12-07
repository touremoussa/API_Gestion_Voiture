<?php
require_once 'repository/PaymentRepository.php';

class PaymentService {
    private $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

  
    public function createPayment($reservation_id, $amount, $payment_method, $status) {
        return $this->repository->createPayment($reservation_id, $amount, $payment_method, $status);
    }

  
    public function getAllPayments() {
        return $this->repository->getAllPayments();
    }
}
?>