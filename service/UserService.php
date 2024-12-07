<?php
require_once 'repository/UserRepository.php';

class UserService {
    private $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function createUser($name, $email, $phone, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User(null, $name, $email, $phone, $hashedPassword);
        return $this->repository->createUser($user);
    }

    public function getUserById($id) {
        return $this->repository->getUserById($id);
    }

    public function updateUser($id, $name, $email, $phone, $password) {
        $user = new User($id, $name, $email, $phone, $password);
        
        return $this->repository->updateUser($user);
    }
}

?>