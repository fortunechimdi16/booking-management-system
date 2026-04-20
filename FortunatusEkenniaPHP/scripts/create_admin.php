<?php
$pdo = require_once '../config/database.php'; // ✅ Ensure correct path

$username = 'admin';
$password = 'admin123'; // ✅ Confirm it's admin123
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare("INSERT INTO admins (username, password_hash) VALUES (:username, :password_hash)");
    $stmt->execute(['username' => $username, 'password_hash' => $hashed_password]);
    echo "✅ Admin user created successfully!";
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
