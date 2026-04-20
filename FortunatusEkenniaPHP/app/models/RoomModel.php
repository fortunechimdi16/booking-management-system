// Model/RoomModel.php
<?php
public function getAvailableRooms($check_in, $check_out) {
    $sql = "SELECT * FROM rooms WHERE is_available = 1 AND room_id NOT IN (
        SELECT room_id FROM reservations WHERE 
        (check_in_date <= :check_out AND check_out_date >= :check_in)
    )";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['check_in' => $check_in, 'check_out' => $check_out]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
} 