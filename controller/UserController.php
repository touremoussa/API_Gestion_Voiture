<?php
require_once 'dto/UserDTO.php';
require_once 'service/UserService.php';

class UserController {
    private $service;

    public function __construct($service) {
        $this->service = $service;
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $name = $data['name'];
            $email = $data['email'];
            $phone = $data['phone'];
            $password = $data['password'];

            $userId = $this->service->createUser($name, $email, $phone, $password);
            echo json_encode(['id' => $userId, 'message' => 'User created successfully']);
        } elseif ($method === 'GET' && isset($_GET['id'])) {
            $user = $this->service->getUserById($_GET['id']);
            if ($user) {
                echo json_encode(new UserDTO($user->getId(), $user->getName(), $user->getEmail(), $user->getPhone()));
            } else {
                echo json_encode(['message' => 'User not found']);
            }
        } elseif ($method === 'PUT' && isset($_GET['id'])) {
           
            $data = json_decode(file_get_contents("php://input"), true);
            $id = $_GET['id'];
            $name = $data['name'];
            $email = $data['email'];
            $phone = $data['phone'];
            $password = $data['password'];

           
            $updatedRows = $this->service->updateUser($id, $name, $email, $phone, $password);
            
            if ($updatedRows > 0) {
                echo json_encode(['message' => 'User updated successfully']);
            } else {
                echo json_encode(['message' => 'No changes made or user not found']);
            }
        } else {
            echo json_encode(['message' => 'Invalid request']);
        }
    }
}
?>