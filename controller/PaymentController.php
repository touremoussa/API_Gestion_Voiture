<?php
require_once 'service/PaymentService.php';
require_once 'dto/PaymentDTO.php';

class PaymentController {
    private $service;

    public function __construct($service) {
        $this->service = $service;
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];

       
        if ($method === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $reservation_id = $data['reservation_id'];
            $amount = $data['amount'];
            $payment_method = $data['payment_method'];
            $status = $data['status'];

            $paymentId = $this->service->createPayment($reservation_id, $amount, $payment_method, $status);

            if ($paymentId) {
                echo json_encode(['id' => $paymentId, 'message' => 'Payment created successfully']);
            } else {
                echo json_encode(['message' => 'Payment creation failed']);
            }
        }
       
        elseif ($method === 'GET') {
           
            $payments = $this->service->getAllPayments();

           
            if (count($payments) > 0) {
             
                $paymentsDTO = [];
                foreach ($payments as $payment) {
                    $paymentsDTO[] = new PaymentDTO(
                        $payment->getId(),
                        $payment->getReservationId(),
                        $payment->getAmount(),
                        $payment->getPaymentMethod(),
                        $payment->getStatus(),
                        $payment->getPaymentDate()
                    );
                }
                echo json_encode($paymentsDTO);
            } else {
                echo json_encode(["message" => "No payments found"]);
            }
        } else {
            echo json_encode(['message' => 'Invalid request']); 
        }
    }
}
?>