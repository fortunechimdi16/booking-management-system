<?php
// AdminController.php

require_once __DIR__ . '/../../app/models/Admin.php';  // Include Admin model
require_once __DIR__ . '/../../config/database.php';  // Include DB connection

class AdminController {
    private $pdo;

    // Constructor to accept the $pdo object
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Display login page
    public function login() {
        require_once __DIR__ . '/../views/admin_login.php';
    }

    // Authenticate admin login
    public function authenticate() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        global $pdo; // Use the $pdo from database.php
        $adminModel = new Admin($pdo);

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $admin = $adminModel->getAdminByUsername($username);

        if ($admin && password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin_username'] = $username; // Set the admin username in the session
            header("Location: /FortunatusEkenniaPHP/public/index.php?controller=admin&action=dashboard");
            exit();
        } else {
            $_SESSION['error'] = "Invalid username or password.";
            header("Location: /FortunatusEkenniaPHP/public/index.php?controller=admin&action=login");
            exit();
        }
    }

    // Admin dashboard (only accessible if logged in)
    public function dashboard() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['admin_username'])) { // Check for admin_username
            header("Location: /FortunatusEkenniaPHP/public/index.php?controller=admin&action=login");
            exit();
        }
        require_once __DIR__ . '/../views/admin_dashboard.php';
    }

    // Admin logout
    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header("Location: /FortunatusEkenniaPHP/public/index.php?controller=admin&action=login");
        exit();
    }

    // Manage rooms (only accessible if logged in)
    public function manage_rooms() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['admin_username'])) { // Check for admin_username
            header("Location: /FortunatusEkenniaPHP/public/index.php?controller=admin&action=login");
            exit();
        }
    
        // Pass $pdo to the view if needed
        $pdo = $this->pdo;
        require_once __DIR__ . '/../views/manage_rooms.php';
    }
}
?>