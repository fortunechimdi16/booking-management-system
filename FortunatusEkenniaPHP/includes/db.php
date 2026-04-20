<?php
$host = 'localhost';
$dbname = 'fortunatusekenniaphp';  // Make sure the database name matches exactly
$username = 'root';                // Default username for MySQL
$password = '';                    // Default password for MySQL (empty)

try {
    // Create a PDO instance to connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "db.php loaded successfully!";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>
