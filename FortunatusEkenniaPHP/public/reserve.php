<?php
// public/reserve.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start the session to handle errors and success messages
session_start();

// Include the ReserveController
require_once('../app/controllers/ReserveController.php');

// Instantiate the controller
$controller = new ReserveController();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $controller->store();
} else {
    // Display the reservation form
    $controller->index();
}