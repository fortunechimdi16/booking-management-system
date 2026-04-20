<?php
// app/models/ReservationModel.php

class ReservationModel {
    private $pdo; // Use $pdo consistently

    public function __construct($pdo) {
        $this->pdo = $pdo;
        if (!$this->pdo) {
            error_log("Database connection failed.");
            die("Database connection failed.");
        }
    }

    public function isRoomAvailable($room_id, $checkin_date, $checkout_date) {
        $sql = "SELECT * FROM reservations WHERE room_id = :room_id AND (
            (checkin_date <= :checkout_date AND checkout_date >= :checkin_date)
        )";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':room_id' => $room_id,
            ':checkin_date' => $checkin_date,
            ':checkout_date' => $checkout_date
        ]);
        return $stmt->rowCount() == 0; // Room is available if no overlapping reservations
    }
    

    public function getRoomPrice($room_id) {
        $sql = "SELECT price_per_night FROM rooms WHERE id = :room_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':room_id' => $room_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            return (float)$result['price_per_night']; // Ensure it's a float
        } else {
            echo "❌ Room not found for ID: $room_id<br>";
            return 0;
        }
    }
    

    public function createReservation($data) {
        try {
            $sql = "INSERT INTO reservations (
                room_id, checkin_date, checkout_date, guest_name, email, phone, 
                num_adults, num_children, num_rooms, confirmation_number, total_cost
            ) VALUES (
                :room_id, :checkin_date, :checkout_date, :guest_name, :email, :phone, 
                :num_adults, :num_children, :num_rooms, :confirmation_number, :total_cost
            )";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            return $this->pdo->lastInsertId(); // Return the ID of the newly created reservation
        } catch (PDOException $e) {
            echo "Database Error: " . $e->getMessage(); // 🐞 This will help you debug
            return false;
        }
    }
    

    
    
}