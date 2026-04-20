<?php
session_start();

// public/index.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database configuration
require_once(__DIR__ . '/../config/database.php');

// Get the controller and action from the URL, or default to 'home' and 'index'
$controllerName = isset($_GET['controller']) ? strtolower($_GET['controller']) : 'home';
$action = isset($_GET['action']) ? strtolower($_GET['action']) : 'index';

// Sanitize controller and action names to prevent directory traversal or malicious input
$controllerName = preg_replace('/[^a-z]/', '', $controllerName); // Allow only lowercase letters
$action = preg_replace('/[^a-z_]/', '', $action); // Allow lowercase letters and underscores


// Build the controller class name (e.g., 'HomeController')
$controllerClass = ucfirst($controllerName) . 'Controller';

// Define the path to the controller file
$controllerFile = __DIR__ . '/../app/controllers/' . $controllerClass . '.php';

// Check if the controller file exists
if (file_exists($controllerFile)) {
    // Include the controller file
    require_once($controllerFile);

    // Check if the controller class exists
    if (class_exists($controllerClass)) {
        // Instantiate the controller and pass the $pdo object
        $controller = new $controllerClass($pdo);

        // Special case for 'reserve' controller and 'confirmation' action
        if ($controllerName == 'reserve' && $action == 'confirmation') {
            $controller->confirmation();
        } else {
            
            // Check if the method exists in the controller
            if (method_exists($controller, $action)) {
                // Call the action method
                $controller->$action();
            } else {
                // Handle invalid action
                http_response_code(404);
                echo "The action '$action' does not exist in controller '$controllerClass'.";
            }
        }
    } else {
        // Handle invalid controller class
        http_response_code(404);
        echo "The controller class '$controllerClass' does not exist.";
    }
} else {
    // Handle invalid controller file
    http_response_code(404);
    echo "The controller file for '$controllerName' does not exist.";
}
?>