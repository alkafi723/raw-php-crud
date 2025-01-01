<?php
require_once __DIR__ . '/../config/db.php';

class User {
    private $db;

    public function __construct() {
        $this->db = getDBConnection();
    }

    public function getAllUsers() {
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($name, $email) {
        $query = $this->db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        return $query->execute();
    }

    public function updateUser($id, $name, $email) {
        $query = $this->db->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function deleteUser($id) {
        $query = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }
}
