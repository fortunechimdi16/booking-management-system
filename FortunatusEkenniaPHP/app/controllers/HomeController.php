<?php
// app/controllers/HomeController.php

class HomeController {
    public function index() {
        // Here, we can call the model to get data from the database if needed

        // Include the view for the index page
        require_once(__DIR__ . '/../views/home/index.php');
    }

    public function dining() {
        $diningViewPath = __DIR__ . '/../views/home/dining.php';
        if (file_exists($diningViewPath)) {
            require_once($diningViewPath);
        } else {
            echo "Error: dining.php not found at: " . $diningViewPath;
        }
    }
    
    public function salon() {
        // Include the view for the salon page
        require_once(__DIR__ . '/../views/home/salon.php');
    }
    
    public function shopping() {
        // Include the view for the shopping page
        require_once(__DIR__ . '/../views/home/shopping.php');
    }
}
