
<?php
require_once(__DIR__ . '/../session.php');


// app/controllers/ReserveController.php

require_once(__DIR__ . '/../models/ReservationModel.php');

class ReserveController {
    private $reservationModel;

    public function __construct($pdo) {
        $this->reservationModel = new ReservationModel($pdo);
    }

    public function index() {
        // Get the room_id from the query parameter
        $room_id = isset($_GET['room_id']) ? intval($_GET['room_id']) : null;

        if (!$room_id) {
            $_SESSION['errors'] = ["Invalid room selection."];
            header("Location: index.php?controller=home&action=index");
            exit();
        }

        // Load the reservation form with the selected room_id
        require_once(__DIR__ . '/../views/reserve.php');
    }

    public function confirmation() {
        require_once(__DIR__ . '/../session.php');
        if (!isset($_SESSION['confirmation_number'])) {
            // Debugging statement
            error_log("Confirmation number not found in session.");
            header("Location: index.php?controller=home&action=index");
            exit();
        }
        require_once(__DIR__ . '/../views/confirmation.php');
    }
    

    

    public function store() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and sanitize form data
        $room_id = intval($_POST['room_id']);
        $checkin_date = trim($_POST['checkin_date']);
        $checkout_date = trim($_POST['checkout_date']);
        $guest_name = trim($_POST['guest_name']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $phone = trim($_POST['phone']);
        $num_adults = intval($_POST['num_adults']);
        $num_children = intval($_POST['num_children']);
        $num_rooms = intval($_POST['num_rooms']);

        // Check room availability
        if (!$this->reservationModel->isRoomAvailable($room_id, $checkin_date, $checkout_date)) {
            $_SESSION['errors'] = ['Room not available.'];
            header("Location: index.php?controller=home&action=index");
            exit;
        }

        // Get room price
        $price_per_room_per_night = $this->reservationModel->getRoomPrice($room_id);
        if (!$price_per_room_per_night) {
            $_SESSION['errors'] = ['Invalid room price.'];
            header("Location: index.php?controller=home&action=index");
            exit;
        }

        // Calculate total cost
        $total_nights = (strtotime($checkout_date) - strtotime($checkin_date)) / (60 * 60 * 24);
        $total_cost = $num_rooms * $total_nights * $price_per_room_per_night;

        // Generate confirmation number
        $confirmation_number = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 10));

        // Prepare data for the model
        $data = [
            ':room_id' => $room_id,
            ':checkin_date' => $checkin_date,
            ':checkout_date' => $checkout_date,
            ':guest_name' => $guest_name,
            ':email' => $email,
            ':phone' => $phone,
            ':num_adults' => $num_adults,
            ':num_children' => $num_children,
            ':num_rooms' => $num_rooms,
            ':confirmation_number' => $confirmation_number,
            ':total_cost' => $total_cost
        ];

        try {
            // Insert into database
            $reservation_id = $this->reservationModel->createReservation($data);

            if ($reservation_id) {
                $_SESSION['confirmation_number'] = $confirmation_number;
                $_SESSION['total_cost'] = $total_cost;

                // Debugging statement
                error_log("Reservation saved. Confirmation Number: $confirmation_number, Total Cost: $total_cost");

                header("Location: index.php?controller=reserve&action=confirmation");
                exit();
            } else {
                echo "❌ Reservation not saved.";
            }
        } catch (PDOException $e) {
            $_SESSION['errors'] = ['Database error: ' . $e->getMessage()];
            header("Location: index.php?controller=home&action=index");
            exit;
        }
    } else {
        $_SESSION['errors'] = ['Invalid request method.'];
        header("Location: index.php?controller=home&action=index");
        exit;
    }
}

    



    

    

    
}