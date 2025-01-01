<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        include __DIR__ . '/../views/user_list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->userModel->createUser($name, $email);
            header("Location: index.php");
        } else {
            include __DIR__ . '/../views/user_form.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->userModel->updateUser($id, $name, $email);
            header("Location: index.php");
        } else {
            $user = $this->userModel->getUserById($id);
            include __DIR__ . '/../views/user_form.php';
        }
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        header("Location: index.php");
    }
}
