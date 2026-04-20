<?php
session_start();
if (!isset($_SESSION['confirmation_number'])) {
    // Debugging: Output the error (temporary)
    echo "Confirmation number not found in session.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .confirmation-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .confirmation-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .confirmation-details {
            margin-bottom: 20px;
        }
        .confirmation-details h4 {
            margin-bottom: 20px;
            color: #333;
        }
        .confirmation-details p {
            margin: 10px 0;
            font-size: 16px;
        }
        .btn-back {
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <div class="confirmation-header">
            <h1>Reservation Confirmed!</h1>
            <p class="lead">Thank you for choosing Fortunatus Hotel. Your reservation details are below.</p>
        </div>

        <div class="confirmation-details">
            <h4>Reservation Details</h4>
            <p><strong>Confirmation Number:</strong> <?php echo $_SESSION['confirmation_number']; ?></p>
            <p><strong>Guest Name:</strong> <?php echo $_SESSION['guest_name']; ?></p>
            <p><strong>Check-in Date:</strong> <?php echo $_SESSION['checkin_date']; ?></p>
            <p><strong>Check-out Date:</strong> <?php echo $_SESSION['checkout_date']; ?></p>
            <p><strong>Room ID:</strong> <?php echo $_SESSION['room_id']; ?></p>
            <p><strong>Total Cost:</strong> $<?php echo $_SESSION['total_cost']; ?></p>
        </div>

        <a href="index.php?controller=home&action=index" class="btn btn-primary btn-back">Back to Home</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>