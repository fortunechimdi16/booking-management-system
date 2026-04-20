<?php
// Include session management
require_once(__DIR__ . '/../session.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['admin_username'])) {
    echo "Debug: Admin not logged in. Redirecting...<br>";
    header('Location: /FortunatusEkenniaPHP/public/index.php?controller=admin&action=login');
    exit;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_room'])) {
        // Add a new room
        $room_number = $_POST['room_number'];
        $room_type = $_POST['room_type'];
        $price_per_night = $_POST['price_per_night'];
        $status = $_POST['status'];
        $description = $_POST['description'];
        $max_adults = $_POST['max_adults'];
        $max_children = $_POST['max_children'];

        $stmt = $pdo->prepare("INSERT INTO rooms (room_number, room_type, price_per_night, status, description, max_adults, max_children) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$room_number, $room_type, $price_per_night, $status, $description, $max_adults, $max_children]);
    } elseif (isset($_POST['edit_room'])) {
        // Edit an existing room
        $id = $_POST['id'];
        $room_number = $_POST['room_number'];
        $room_type = $_POST['room_type'];
        $price_per_night = $_POST['price_per_night'];
        $status = $_POST['status'];
        $description = $_POST['description'];
        $max_adults = $_POST['max_adults'];
        $max_children = $_POST['max_children'];

        $stmt = $pdo->prepare("UPDATE rooms SET room_number = ?, room_type = ?, price_per_night = ?, status = ?, description = ?, max_adults = ?, max_children = ? WHERE id = ?");
        $stmt->execute([$room_number, $room_type, $price_per_night, $status, $description, $max_adults, $max_children, $id]);
    } elseif (isset($_POST['delete_room'])) {
        // Delete a room
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM rooms WHERE id = ?");
        $stmt->execute([$id]);
    }
}

// Fetch all rooms from the database
$stmt = $pdo->query("SELECT * FROM rooms");
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Rooms</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file -->
</head>
<body>
<div class="container">
    <h1>Manage Rooms</h1>
    <a href="http://localhost/FortunatusEkenniaPHP/public/index.php?controller=admin&action=dashboard" class="btn-back">Back to Dashboard</a>

    <!-- Add Room Form -->
    <h2>Add New Room</h2>
    <form method="POST" class="room-form">
        <input type="text" name="room_number" placeholder="Room Number" required>
        <input type="text" name="room_type" placeholder="Room Type" required>
        <input type="number" step="0.01" name="price_per_night" placeholder="Price Per Night" required>
        <select name="status" required>
            <option value="available">Available</option>
            <option value="booked">Booked</option>
            <option value="maintenance">Maintenance</option>
        </select>
        <textarea name="description" placeholder="Description"></textarea>
        <input type="number" name="max_adults" placeholder="Max Adults" required>
        <input type="number" name="max_children" placeholder="Max Children" required>
        <button type="submit" name="add_room" class="btn-primary">Add Room</button>
    </form>

    <!-- List of Rooms -->
    <h2>Room List</h2>
    <table class="room-table">
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Price Per Night</th>
                <th>Status</th>
                <th>Description</th>
                <th>Max Adults</th>
                <th>Max Children</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td data-label="Room Number"><?= htmlspecialchars($room['room_number']) ?></td>
                    <td data-label="Room Type"><?= htmlspecialchars($room['room_type']) ?></td>
                    <td data-label="Price Per Night"><?= htmlspecialchars($room['price_per_night']) ?></td>
                    <td data-label="Status"><?= htmlspecialchars($room['status']) ?></td>
                    <td data-label="Description"><?= htmlspecialchars($room['description']) ?></td>
                    <td data-label="Max Adults"><?= htmlspecialchars($room['max_adults']) ?></td>
                    <td data-label="Max Children"><?= htmlspecialchars($room['max_children']) ?></td>
                    <td data-label="Actions">
                        <!-- Edit Form -->
                        <form method="POST" class="form-inline">
                            <input type="hidden" name="id" value="<?= $room['id'] ?>">
                            <input type="text" name="room_number" value="<?= $room['room_number'] ?>">
                            <input type="text" name="room_type" value="<?= $room['room_type'] ?>">
                            <input type="number" step="0.01" name="price_per_night" value="<?= $room['price_per_night'] ?>">
                            <select name="status">
                                <option value="available" <?= $room['status'] === 'available' ? 'selected' : '' ?>>Available</option>
                                <option value="booked" <?= $room['status'] === 'booked' ? 'selected' : '' ?>>Booked</option>
                                <option value="maintenance" <?= $room['status'] === 'maintenance' ? 'selected' : '' ?>>Maintenance</option>
                            </select>
                            <textarea name="description"><?= $room['description'] ?></textarea>
                            <input type="number" name="max_adults" value="<?= $room['max_adults'] ?>">
                            <input type="number" name="max_children" value="<?= $room['max_children'] ?>">
                            <button type="submit" name="edit_room" class="btn-edit">Edit</button>
                        </form>
                        <!-- Delete Form -->
                        <form method="POST" class="form-inline">
                            <input type="hidden" name="id" value="<?= $room['id'] ?>">
                            <button type="submit" name="delete_room" class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>

    /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7f6;
    color: #333;
    margin: 0;
    padding: 0;
    line-height: 1.6;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1, h2 {
    color: #2c3e50;
    margin-bottom: 20px;
}

a {
    color: #3498db;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Buttons */
.btn-back, .btn-primary, .btn-edit, .btn-delete {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    text-align: center;
    transition: background-color 0.3s ease;
}

.btn-back {
    background-color: #3498db;
    color: white;
    margin-bottom: 20px;
}

.btn-back:hover {
    background-color: #2980b9;
}

.btn-primary {
    background-color: #27ae60;
    color: white;
}

.btn-primary:hover {
    background-color: #219653;
}

.btn-edit {
    background-color: #f39c12;
    color: white;
}

.btn-edit:hover {
    background-color: #e67e22;
}

.btn-delete {
    background-color: #e74c3c;
    color: white;
}

.btn-delete:hover {
    background-color: #c0392b;
}

/* Forms */
.room-form {
    margin-bottom: 40px;
}

.room-form input[type="text"],
.room-form input[type="number"],
.room-form select,
.room-form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

.room-form textarea {
    resize: vertical;
    height: 100px;
}

.room-form button {
    margin-top: 10px;
}

/* Tables */
.room-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.room-table th,
.room-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.room-table th {
    background-color: #3498db;
    color: white;
}

.room-table tr:hover {
    background-color: #f1f1f1;
}

.room-table td[data-label] {
    font-size: 14px;
}

/* Action Buttons */
.form-inline {
    display: flex;
    gap: 10px;
    align-items: center;
}

.form-inline input[type="text"],
.form-inline input[type="number"],
.form-inline select,
.form-inline textarea {
    flex: 1;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

.form-inline button {
    padding: 8px 12px;
    font-size: 14px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 100%;
        padding: 10px;
    }

    .room-table, .room-table thead, .room-table tbody, .room-table th, .room-table td, .room-table tr {
        display: block;
    }

    .room-table th {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }

    .room-table tr {
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }

    .room-table td {
        border: none;
        position: relative;
        padding-left: 50%;
    }

    .room-table td:before {
        position: absolute;
        left: 10px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        content: attr(data-label);
        font-weight: bold;
    }

    .form-inline {
        flex-direction: column;
        gap: 5px;
    }

    .form-inline button {
        width: 100%;
    }
}



</style>

</body>
</html>