<?php
require_once 'repository/AgencyRepository.php';

class AgencyService {
    private $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function addAgency($name, $address, $phone, $email) {
        $agency = new Agency(null, $name, $address, $phone, $email);
        return $this->repository->addAgency($agency);
    }

    public function getAllAgencies() {
        return $this->repository->getAllAgencies();
    }

    public function getAgencyById($id) {
        return $this->repository->getAgencyById($id);
    }
}
?>