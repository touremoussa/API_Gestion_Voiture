<?php
require_once 'repository/Database.php';
require_once 'repository/UserRepository.php';
require_once 'service/UserService.php';
require_once 'controller/UserController.php';
require_once 'repository/AgencyRepository.php';
require_once 'service/AgencyService.php';
require_once 'controller/AgencyController.php';
require_once 'repository/VehicleRepository.php';
require_once 'service/VehicleService.php';
require_once 'controller/VehicleController.php';
require_once 'repository/ReservationRepository.php';
require_once 'service/ReservationService.php';
require_once 'controller/ReservationController.php';
require_once 'repository/PaymentRepository.php';  
require_once 'service/PaymentService.php';  
require_once 'controller/PaymentController.php';  


$database = new Database();
$db = $database->getConnection();

if ($db) {
    
    echo "Connexion réussie à la base de données 'gestion_voiture'.<br>";

    $method = $_SERVER['REQUEST_METHOD'];

    if (strpos($_SERVER['REQUEST_URI'], 'user') !== false) {
        
        $userRepository = new UserRepository($db);
        $userService = new UserService($userRepository);
        $userController = new UserController($userService);
        $userController->handleRequest();
    } elseif (strpos($_SERVER['REQUEST_URI'], 'agency') !== false) {
        
        $agencyRepository = new AgencyRepository($db);
        $agencyService = new AgencyService($agencyRepository);
        $agencyController = new AgencyController($agencyService);
        $agencyController->handleRequest();
    } elseif (strpos($_SERVER['REQUEST_URI'], 'vehicle') !== false) {
        
        $vehicleRepository = new VehicleRepository($db);
        $vehicleService = new VehicleService($vehicleRepository);
        $vehicleController = new VehicleController($vehicleService);
        $vehicleController->handleRequest();
    } elseif (strpos($_SERVER['REQUEST_URI'], 'reservation') !== false) {
        
        $reservationRepository = new ReservationRepository($db);
        $reservationService = new ReservationService($reservationRepository);
        $reservationController = new ReservationController($reservationService);
        $reservationController->handleRequest();
    } elseif (strpos($_SERVER['REQUEST_URI'], 'payment') !== false) {  
       
        $paymentRepository = new PaymentRepository($db);
        $paymentService = new PaymentService($paymentRepository);
        $paymentController = new PaymentController($paymentService);
        $paymentController->handleRequest();
    } else {
        echo "Page introuvable pour cette requête.";
    }
} else {
    echo "Échec de la connexion.";
}
?>