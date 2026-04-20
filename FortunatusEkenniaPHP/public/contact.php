<?php include(__DIR__ . '/partials/header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Contact Us</h2>
    <div class="row">
        <div class="col-md-6">
            <h4>Customer Service</h4>
            <p>We're here to assist you 24/7 with your reservations and inquiries.</p>
            <h5>Contact Details</h5>
            <ul class="list-unstyled">
                <li><strong>Phone:</strong> +1 732-456-3256</li>
                <li><strong>Fax:</strong> +1 732-456-3257</li>
                <li><strong>Email:</strong> <a href="mailto:contact@fortunehotel.com">contact@fortunehotel.com</a></li>
                <li><strong>Website:</strong> <a href="https://www.fortunatushotel.com" target="_blank">www.fortunatushotel.com</a></li>
                <li><strong>Instagram:</strong> <a href="https://www.instagram.com/hotel_fortune" target="_blank">@hotel_fortune</a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <h4>Contact Form</h4>
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <div class="alert alert-success">✅ Your message has been sent successfully!</div>
            <?php endif; ?>
            <form action="contact_process.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        background: url('images/contact.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: Arial, sans-serif;
    }
    .contact-container {
        background: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        max-width: 600px;
        margin: 50px auto;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>

<?php include(__DIR__ . '/partials/footer.php'); ?>
