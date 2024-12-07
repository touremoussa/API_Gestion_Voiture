<?php
require_once 'service/ReservationService.php';
require_once 'dto/ReservationDTO.php';

class ReservationController {
    private $service;

    public function __construct($service) {
        $this->service = $service;
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST') {
           
            $data = json_decode(file_get_contents("php://input"), true);
            $user_id = $data['user_id'];
            $vehicle_id = $data['vehicle_id'];
            $start_date = $data['start_date'];
            $end_date = $data['end_date'];
            $total_price = $data['total_price'];

            $reservationId = $this->service->createReservation($user_id, $vehicle_id, $start_date, $end_date, $total_price);
            echo json_encode(['id' => $reservationId, 'message' => 'Reservation created successfully']);
        } elseif ($method === 'PUT') {
           
            $data = json_decode(file_get_contents("php://input"), true);
            $id = $data['id'];
            $vehicle_id = $data['vehicle_id'];
            $start_date = $data['start_date'];
            $end_date = $data['end_date'];
            $status = $data['status'];
            $total_price = $data['total_price'];

            
            $updatedRows = $this->service->updateReservation($id, $vehicle_id, $start_date, $end_date, $status, $total_price);
            
            if ($updatedRows > 0) {
                echo json_encode(['message' => 'Reservation updated successfully']);
            } else {
                echo json_encode(['message' => 'Reservation not found']);
            }
        } elseif ($method === 'DELETE' && isset($_GET['id'])) {
           
            $id = $_GET['id'];
            $deletedRows = $this->service->deleteReservation($id);
            if ($deletedRows > 0) {
                echo json_encode(['message' => 'Reservation deleted successfully']);
            } else {
                echo json_encode(['message' => 'Reservation not found']);
            }
        } elseif ($method === 'GET') {
            
            $reservations = $this->service->getAllReservations();  
            
            
            if ($reservations) {
                $reservationsDTO = [];
                foreach ($reservations as $reservation) {
                    $reservationsDTO[] = new ReservationDTO(
                        $reservation->getId(),
                        $reservation->getUserId(),
                        $reservation->getVehicleId(),
                        $reservation->getStartDate(),
                        $reservation->getEndDate(),
                        $reservation->getStatus(),
                        $reservation->getTotalPrice(),
                        $reservation->getCreatedAt()
                    );
                }
                echo json_encode($reservationsDTO);
            } else {
                echo json_encode(['message' => 'No reservations found']);
            }
        } else {
            
            echo json_encode(['message' => 'Invalid request']);
        }
    }
}
?>