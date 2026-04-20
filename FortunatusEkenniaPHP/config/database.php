<?php 
// config/database.php

// Database configuration
$host = "localhost";
$dbname = "fortunatusekenniaphp"; 
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    return $pdo; // ✅ Return the PDO connection
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
