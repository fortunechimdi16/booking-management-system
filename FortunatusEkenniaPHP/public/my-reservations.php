<?php include(__DIR__ . '/partials/header.php'); ?>

<!-- Add a background image and overlay -->
<div class="reservation-hero">
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-white">Find Your Reservation</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
            <form action="/FortunatusEkenniaPHP/public/index.php" method="GET" class="reservation-form">
    <input type="hidden" name="controller" value="reserve">
    <input type="hidden" name="action" value="search">
    <div class="mb-3">
        <label for="lastName" class="form-label text-white">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="last_name" required placeholder="Enter your last name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label text-white">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
    </div>
    <button type="submit" class="btn btn-primary w-100">Search Reservation</button>
</form>

            </div>
        </div>
    </div>
</div>

<style>/* Background and overlay */
.reservation-hero {
    background-image: url('../images/reserved.jpg'); /* Path to your background image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh; /* Full viewport height */
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

/* Overlay to darken the background */
.reservation-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5); /* Dark overlay */
    z-index: 1;
}

/* Container for the form */
.reservation-hero .container {
    position: relative;
    z-index: 2; /* Ensure content is above the overlay */
    background: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Form styling */
.reservation-form {
    max-width: 500px;
    margin: 0 auto;
}

.reservation-form .form-control {
    border-radius: 5px;
    border: 1px solid #ccc;
    padding: 0.75rem;
    font-size: 1rem;
}

.reservation-form .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.reservation-form .btn-primary {
    background-color: #007bff;
    border: none;
    padding: 0.75rem;
    font-size: 1rem;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.reservation-form .btn-primary:hover {
    background-color: #0056b3;
}

/* Text styling */
.text-white {
    color: #fff !important;
}</style>


<?php include(__DIR__ . '/partials/footer.php'); ?>