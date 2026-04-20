<?php
require_once(__DIR__ . '/../session.php');


require_once(__DIR__ . '/../../config/database.php');

// Check if room_id is provided
$room_id = isset($_GET['room_id']) ? intval($_GET['room_id']) : 0;
if ($room_id <= 0) {
    die("Invalid room selection.");
}

// Define room details based on room_id
$rooms = [
    1 => [
        'name' => 'Luxury Room',
        'price' => 300,
        'image' => 'luxury.jpg',
        'max_adults' => 2,
        'max_children' => 2,
    ],
    2 => [
        'name' => 'Deluxe Room',
        'price' => 150,
        'image' => 'deluxe.jpg',
        'max_adults' => 2,
        'max_children' => 1,
    ],
    3 => [
        'name' => 'Suites',
        'price' => 250,
        'image' => 'suites.jpg',
        'max_adults' => 3,
        'max_children' => 2,
    ],
];

// Get the selected room details
$room = $rooms[$room_id] ?? null;
if (!$room) {
    die("Invalid room selection.");

}

// Include the ReserveController
//require_once(__DIR__ . '/../../app/controllers/ReserveController.php');

// Instantiate the ReserveController with the PDO connection
//$reserveController = new ReserveController($pdo);

// Call the index method to load the reservation form
//$reserveController->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve a Room | Fortunatus Hotel</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Link to external CSS -->
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Reserve a Room</h2>

            <!-- Display Room Details -->
            <div class="room-details">
                <img src="../images/<?php echo $room['image']; ?>" alt="<?php echo $room['name']; ?>" class="room-image">
                <h3><?php echo $room['name']; ?></h3>
                <p>Price: $<?php echo $room['price']; ?> per night</p>
                <p>Max Adults: <?php echo $room['max_adults']; ?> | Max Children: <?php echo $room['max_children']; ?></p>
            </div>

            <?php
            // Display errors if they exist
            if (isset($_SESSION['errors'])) {
                echo "<ul class='error'>";
                foreach ($_SESSION['errors'] as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul>";
                unset($_SESSION['errors']); // Clear errors after displaying
            }

            // Display success message if it exists
            if (isset($_SESSION['success'])) {
                echo "<p class='success'>" . $_SESSION['success'] . "</p>";
                unset($_SESSION['success']); // Clear success message after displaying
            }
            ?>

            <!-- Reservation Form -->
            <form id="reservationForm">
                <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">

                <label for="guest_name">Full Name:</label>
                <input type="text" id="guest_name" name="guest_name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required>

                <label for="checkin_date">Check-in Date:</label>
                <input type="date" id="checkin_date" name="checkin_date" required>

                <label for="checkout_date">Check-out Date:</label>
                <input type="date" id="checkout_date" name="checkout_date" required>

                <label for="num_adults">Number of Adults:</label>
                <input type="number" id="num_adults" name="num_adults" min="1" max="<?php echo $room['max_adults']; ?>" required>

                <label for="num_children">Number of Children:</label>
                <input type="number" id="num_children" name="num_children" min="0" max="<?php echo $room['max_children']; ?>" required>

                <label for="num_rooms">Number of Rooms:</label>
                <input type="number" id="num_rooms" name="num_rooms" min="1" required>

                <button type="submit" class="reserve-btn">Reserve</button>
            </form>

            <!-- Add a div to display the response message -->
            <div id="responseMessage"></div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- AJAX Script -->
    <script>
        $(document).ready(function() {
            $('#reservationForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting normally

                // Serialize the form data
                var formData = $(this).serialize();

                // Send the AJAX request
                $.ajax({
                    url: '../public/index.php?controller=reserve&action=store', // URL to your store method
                    type: 'POST',
                    data: formData,
                    dataType: 'json', // Expect JSON response
                    success: function(response) {
                        if (response.status === 'success') {
                            // Display success message (optional)
                            $('#responseMessage').html(
                                '<div class="alert alert-success">' +
                                response.message + '<br>' +
                                'Confirmation Number: ' + response.confirmation_number +
                                '</div>'
                            );

                            // Redirect to the confirmation page
                            window.location.href = 'index.php?controller=reserve&action=confirmation';
                        } else {
                            // Display error message
                            $('#responseMessage').html(
                                '<div class="alert alert-danger">' + response.message + '</div>'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX errors
                        $('#responseMessage').html(
                            '<div class="alert alert-danger">An error occurred: ' + error + '</div>'
                        );
                    }
                });
            });
        });
    </script>

    <style>
        /* Global Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('../images/reserved.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* Container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Form Container */
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        /* Room Details */
        .room-details {
            text-align: center;
            margin-bottom: 20px;
        }

        .room-details img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        .room-details h3 {
            margin: 10px 0 5px;
            font-size: 24px;
            color: #333;
        }

        .room-details p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }

        /* Form Inputs */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Buttons */
        .reserve-btn {
            margin-top: 15px;
            background: #007BFF;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .reserve-btn:hover {
            background: #0056b3;
        }

        /* Error & Success Messages */
        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
            text-align: center;
        }
    </style>

    <script src="../public/js/script.js"></script>
</body>
</html>