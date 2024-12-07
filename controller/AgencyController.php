<?php
require_once 'service/AgencyService.php';
require_once 'dto/AgencyDTO.php';

class AgencyController {
    private $service;

    public function __construct($service) {
        $this->service = $service;
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $name = $data['name'];
            $address = $data['address'];
            $phone = $data['phone'];
            $email = $data['email'];

            $agencyId = $this->service->addAgency($name, $address, $phone, $email);
            echo json_encode(['id' => $agencyId, 'message' => 'Agency added successfully']);
        } elseif ($method === 'GET') {
            if (isset($_GET['id'])) {
                $agency = $this->service->getAgencyById($_GET['id']);
                if ($agency) {
                    echo json_encode(new AgencyDTO($agency->getId(), $agency->getName(), $agency->getAddress(), $agency->getPhone(), $agency->getEmail()));
                } else {
                    echo json_encode(['message' => 'Agency not found']);
                }
            } else {
                $agencies = $this->service->getAllAgencies();
                $agenciesDTO = [];
                foreach ($agencies as $agency) {
                    $agenciesDTO[] = new AgencyDTO($agency->getId(), $agency->getName(), $agency->getAddress(), $agency->getPhone(), $agency->getEmail());
                }
                echo json_encode($agenciesDTO);
            }
        } else {
            echo json_encode(['message' => 'Invalid request']);
        }
    }
}
?>