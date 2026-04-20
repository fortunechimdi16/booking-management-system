<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Fortunatus Hotel</title>
    
</head>
<body>
    <div class="container">
        <?php
        if (isset($_SESSION['admin_username'])) {
            echo "<h2>Welcome, " . $_SESSION['admin_username'] . "</h2>";
        } else {
            echo "<h2>Welcome, Admin</h2>";
            // You could add a redirect to the login page here if needed
            // header('Location: login.php'); exit;
        }
        ?>
       <a href="/FortunatusEkenniaPHP/public/index.php?controller=admin&action=manage_rooms">Manage Rooms</a>


        | 
        <a href="/FortunatusEkenniaPHP/public/index.php?controller=admin&action=logout" class="btn btn-danger">Logout</a>
    </div>

    <style>
        /* Set the body to use the background image from the public/image folder */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('/FortunatusEkenniaPHP/public/image/admin.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh; /* Full viewport height */
            color: white;
        }

        /* Container for the text content with an overlay for better readability */
        .container {
            padding: 50px;
            text-align: center;
            z-index: 1; /* Ensure content is above the background */
            position: relative;
        }

        /* Add a semi-transparent background overlay to improve text visibility */
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay with 50% opacity */
            z-index: -1; /* Ensure overlay is below the text */
        }

        h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        a {
            font-size: 1.2em;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 5px;
        }

        a:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }

        .btn-danger {
            background-color: red;
        }
    </style>
</body>
</html>
