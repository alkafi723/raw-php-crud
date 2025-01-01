<?php
require_once __DIR__ . '/controllers/UserController.php';

$controller = new UserController();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if (method_exists($controller, $action)) {
    $controller->$action($id);
} else {
    echo "Invalid action.";
}
