<?php
// Database connection
function getDBConnection() {
    $host = 'localhost';
    $db = 'phpcrud';
    $user = 'root';
    $password = '';

    try {
        return new PDO("mysql:host=$host;dbname=$db", $user, $password);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}
