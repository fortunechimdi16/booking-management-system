<?php
// app/models/HotelModel.php

class HotelModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getHotelInfo() {
        // Fetch hotel information from the database
        $sql = "SELECT * FROM hotel_info LIMIT 1"; // Assuming you have a table for hotel info
        $stmt = $this->pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAvailableRooms($check_in, $check_out) {
        // Fetch available rooms based on check-in and check-out dates
        $sql = "SELECT * FROM rooms WHERE is_available = 1 AND room_id NOT IN (
            SELECT room_id FROM reservations WHERE 
            (check_in_date <= :check_out AND check_out_date >= :check_in)
        )";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['check_in' => $check_in, 'check_out' => $check_out]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createReservation($data) {
        // Insert reservation into the database
        $sql = "INSERT INTO reservations (room_id, guest_name, email, phone, check_in_date, check_out_date, num_adults, num_children, total_cost, confirmation_number) 
                VALUES (:room_id, :guest_name, :email, :phone, :check_in_date, :check_out_date, :num_adults, :num_children, :total_cost, :confirmation_number)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }

    public function getReservationById($reservation_id) {
        // Fetch reservation details by ID
        $sql = "SELECT * FROM reservations WHERE reservation_id = :reservation_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['reservation_id' => $reservation_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}