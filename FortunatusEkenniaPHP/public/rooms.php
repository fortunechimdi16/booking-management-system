<?php
// Start the session (if needed for error/success messages)
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms | Fortunatus Hotel</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to external CSS -->
    <style>
        /* Global Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f4; /* Light gray background */
        }

        /* Container */
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Room Cards */
        .room-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .room-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .room-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .room-card .content {
            padding: 20px;
            text-align: center;
        }

        .room-card h3 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .room-card p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        .room-card a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .room-card a:hover {
            background: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .room-card {
                margin-bottom: 15px;
            }

            .room-card h3 {
                font-size: 20px;
            }

            .room-card p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Our Rooms</h1>

        <!-- Luxury Room (ID: 1) -->
        <div class="room-card">
            <img src="images/luxury.jpg" alt="Luxury Room">
            <div class="content">
                <h3>Luxury Room</h3>
                <p>Price: $300 per night</p>
                <p>Max Adults: 2 | Max Children: 2</p>
                <a href="reserve.php?room_id=1">Reserve Now</a>
            </div>
        </div>

        <!-- Deluxe Room (ID: 2) -->
        <div class="room-card">
            <img src="images/deluxe.jpg" alt="Deluxe Room">
            <div class="content">
                <h3>Deluxe Room</h3>
                <p>Price: $150 per night</p>
                <p>Max Adults: 2 | Max Children: 1</p>
                <a href="reserve.php?room_id=2">Reserve Now</a>
            </div>
        </div>

        <!-- Suites (ID: 3) -->
        <div class="room-card">
            <img src="images/suites.jpg" alt="Suites">
            <div class="content">
                <h3>Suites</h3>
                <p>Price: $250 per night</p>
                <p>Max Adults: 3 | Max Children: 2</p>
                <a href="reserve.php?room_id=3">Reserve Now</a>
            </div>
        </div>
    </div>
</body>
</html>