<?php
require_once 'service/VehicleService.php';
require_once 'dto/VehicleDTO.php';

class VehicleController {
    private $service;

    public function __construct($service) {
        $this->service = $service;
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $make = $data['make'];
            $model = $data['model'];
            $price_per_day = $data['price_per_day'];
            $availability_status = $data['availability_status'];
            $agency_id = $data['agency_id'];

            $vehicleId = $this->service->addVehicle($make, $model, $price_per_day, $availability_status, $agency_id);
            echo json_encode(['id' => $vehicleId, 'message' => 'Vehicle added successfully']);
        } elseif ($method === 'PUT' && isset($_GET['id'])) {
            $data = json_decode(file_get_contents("php://input"), true);
            $id = $_GET['id'];
            $make = $data['make'];
            $model = $data['model'];
            $price_per_day = $data['price_per_day'];
            $availability_status = $data['availability_status'];
            $agency_id = $data['agency_id'];

            $updatedRows = $this->service->updateVehicle($id, $make, $model, $price_per_day, $availability_status, $agency_id);
            if ($updatedRows > 0) {
                echo json_encode(['message' => 'Vehicle updated successfully']);
            } else {
                echo json_encode(['message' => 'No changes made or vehicle not found']);
            }
        } elseif ($method === 'DELETE' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $deletedRows = $this->service->deleteVehicle($id);
            if ($deletedRows > 0) {
                echo json_encode(['message' => 'Vehicle deleted successfully']);
            } else {
                echo json_encode(['message' => 'Vehicle not found']);
            }
        } elseif ($method === 'GET') {
            $vehicles = $this->service->getAvailableVehicles();
            $vehiclesDTO = [];
            foreach ($vehicles as $vehicle) {
                $vehiclesDTO[] = new VehicleDTO($vehicle->getId(), $vehicle->getMake(), $vehicle->getModel(), $vehicle->getPricePerDay(), $vehicle->getAvailabilityStatus(), $vehicle->getAgencyId());
            }
            echo json_encode($vehiclesDTO);
        } else {
            echo json_encode(['message' => 'Invalid request']);
        }
    }
}
?>