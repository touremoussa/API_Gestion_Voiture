<?php
require_once 'repository/VehicleRepository.php';

class VehicleService {
    private $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function addVehicle($make, $model, $price_per_day, $availability_status, $agency_id) {
        $vehicle = new Vehicle(null, $make, $model, $price_per_day, $availability_status, $agency_id);
        return $this->repository->addVehicle($vehicle);
    }

    public function updateVehicle($id, $make, $model, $price_per_day, $availability_status, $agency_id) {
        $vehicle = new Vehicle($id, $make, $model, $price_per_day, $availability_status, $agency_id);
        return $this->repository->updateVehicle($vehicle);
    }

    public function deleteVehicle($id) {
        return $this->repository->deleteVehicle($id);
    }

    public function getAvailableVehicles() {
        return $this->repository->getAvailableVehicles();
    }
}
?>