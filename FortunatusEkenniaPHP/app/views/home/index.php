<?php
// app/views/home/index.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fortunatus Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

      
    <!-- Include the Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
   <!-- Hero Section with 5 Slides -->
<header class="hero-section position-relative">
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div id="hotelCarousel" class="carousel slide shadow-lg rounded" data-bs-ride="carousel">
          <!-- Carousel Indicators -->
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#hotelCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#hotelCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#hotelCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#hotelCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#hotelCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
          </div>
          <!-- Carousel Inner -->
          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
              <img src="images/overview.jpg" class="d-block w-100" alt="Hotel Overview">
              <div class="carousel-caption">
                <h1 class="display-4">Welcome to Fortunatus Hotel</h1>
                <p class="lead">Your luxury getaway starts here</p>
                <button class="btn btn-primary btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
              <img src="images/lobby.jpg" class="d-block w-100" alt="Hotel Lobby">
              <div class="carousel-caption">
                <h1 class="display-4">Unmatched Comfort &amp; Style</h1>
                <p class="lead">Experience premium hospitality</p>
                <button class="btn btn-primary btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
              </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
              <img src="images/overview2.jpg" class="d-block w-100" alt="Scenic View">
              <div class="carousel-caption">
                <h1 class="display-4">Stunning Views &amp; Great Service</h1>
                <p class="lead">Relax and enjoy your stay</p>
                <button class="btn btn-primary btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
              </div>
            </div>
            <!-- Slide 4 -->
            <div class="carousel-item">
              <img src="images/overview5.jpg" class="d-block w-100" alt="Deluxe Room">
              <div class="carousel-caption">
                <h1 class="display-4">Spacious &amp; Elegant Rooms</h1>
                <p class="lead">Feel at home in luxury</p>
                <button class="btn btn-primary btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
              </div>
            </div>
            <!-- Slide 5 -->
            <div class="carousel-item">
              <img src="images/overview4.jpg" class="d-block w-100" alt="Swimming Pool">
              <div class="carousel-caption">
                <h1 class="display-4">Relax by the Pool</h1>
                <p class="lead">Cool off with breathtaking views</p>
                <button class="btn btn-primary btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
              </div>
            </div>
          </div>
          <!-- Carousel Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#hotelCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#hotelCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingModalLabel">Book Your Stay</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="reserve.php" method="POST">
          <div class="mb-3">
            <label for="checkin_date" class="form-label">Check-in Date:</label>
            <input type="date" id="checkin_date" name="checkin_date" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="checkout_date" class="form-label">Check-out Date:</label>
            <input type="date" id="checkout_date" name="checkout_date" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="num_rooms" class="form-label">Number of Rooms:</label>
            <input type="number" id="num_rooms" name="num_rooms" class="form-control" min="1" required>
          </div>
          <div class="mb-3">
            <label for="customer_name" class="form-label">Name:</label>
            <input type="text" id="customer_name" name="customer_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="customer_email" class="form-label">Email:</label>
            <input type="email" id="customer_email" name="customer_email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="customer_phone" class="form-label">Phone:</label>
            <input type="tel" id="customer_phone" name="customer_phone" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Reserve Now</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Additional CSS (if needed) -->
<style>
  .hero-section img {
    height: 500px;
    object-fit: cover;
    filter: brightness(85%);
  }
  .carousel-caption {
    background: rgba(0, 0, 0, 0.6);
    padding: 20px;
    border-radius: 10px;
  }
  .carousel-caption h1,
  .carousel-caption p {
    color: white;
  }
</style>


<!-- Combined Hotel Details and Booking Section -->
<section class="container mt-5">
  <div class="row">
    <!-- Hotel Details (Left Column) -->
    <div class="col-md-4">
      <div class="border p-4 shadow-sm rounded">
        <h3 class="mb-4 text-primary">Your Comfort is Our Priority</h3>
        <ul class="list-unstyled">
          <li class="mb-3 d-flex align-items-center">
            <i class="fa-solid fa-location-dot fa-lg text-primary"></i>
            <span class="ms-2">1 Victorian Ave, Victoria Island, Lagos</span>
          </li>
          <li class="mb-3 d-flex align-items-center">
            <i class="fa-solid fa-phone fa-lg text-primary"></i>
            <span class="ms-2">
              <a href="tel:+17324563256" class="text-dark text-decoration-none">+1 732 456 3256</a>
            </span>
          </li>
          <li class="mb-3 d-flex align-items-center">
            <i class="fa-solid fa-envelope fa-lg text-primary"></i>
            <span class="ms-2">
              <a href="mailto:contact@fortunehotel.com" class="text-dark text-decoration-none">contact@fortunehotel.com</a>
            </span>
          </li>
          <li class="mb-3 d-flex align-items-center">
            <i class="fa-solid fa-globe fa-lg text-primary"></i>
            <span class="ms-2">
              <a href="https://www.fortunatushotel.com" class="text-dark text-decoration-none">www.fortunatushotel.com</a>
            </span>
          </li>
        </ul>
      </div>
    </div>

    <!-- Booking Section (Right Column) -->
    <div class="col-md-8">
      <div class="booking-container p-4 shadow-lg rounded bg-light">
        <h3 class="text-center mb-4 text-primary">
          <i class="fa-solid fa-bed"></i> Book Your Stay
        </h3>
        <form action="reserve.php" method="POST">
          <div class="row g-3">
            <div class="col-md-4">
              <label for="checkin" class="form-label">
                <i class="fas fa-calendar-alt"></i> Check-in Date:
              </label>
              <input type="date" id="checkin" name="checkin" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label for="checkout" class="form-label">
                <i class="fas fa-calendar-alt"></i> Check-out Date:
              </label>
              <input type="date" id="checkout" name="checkout" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label for="rooms" class="form-label">
                <i class="fas fa-door-open"></i> Rooms:
              </label>
              <input type="number" id="rooms" name="rooms" class="form-control" min="1" value="1" required>
            </div>
          </div>
          <div class="row g-3 mt-3">
            <div class="col-md-4">
              <label for="adults" class="form-label">
                <i class="fas fa-user"></i> Adults:
              </label>
              <input type="number" id="adults" name="adults" class="form-control" min="1" value="1" required>
            </div>
            <div class="col-md-4">
              <label for="children" class="form-label">
                <i class="fas fa-child"></i> Children:
              </label>
              <input type="number" id="children" name="children" class="form-control" min="0" value="0">
            </div>
            <div class="col-md-4 d-flex align-items-end">
              <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-check-circle"></i> Check Availability
              </button>
            </div>
          </div>
          <div class="text-center mt-3">
            <p class="text-success fw-bold" id="priceDisplay"></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


<!-- Rooms Section with Cards -->
<section class="mt-5">
    <h3>Our Rooms:</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="/FortunatusEkenniaPHP/public/images/luxury.jpg" class="card-img-top" alt="Room Image">
                <div class="card-body">
                    <h5 class="card-title">Luxury Room</h5>
                    <p class="card-text">A luxurious room with amazing views and top-notch amenities.</p>
                    <a href="index.php?controller=reserve&action=index&room_id=1" class="btn btn-primary">Reserve Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="/FortunatusEkenniaPHP/public/images/deluxe.jpg" class="card-img-top" alt="Room Image">
                <div class="card-body">
                    <h5 class="card-title">Deluxe Room</h5>
                    <p class="card-text">Experience the comfort and style with our Deluxe Room.</p>
                    <a href="index.php?controller=reserve&action=index&room_id=2" class="btn btn-primary">Reserve Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="/FortunatusEkenniaPHP/public/images/suites.jpg" class="card-img-top" alt="Room Image">
                <div class="card-body">
                    <h5 class="card-title">Suite</h5>
                    <p class="card-text">Our spacious suite is perfect for families or extended stays.</p>
                    <a href="index.php?controller=reserve&action=index&room_id=3" class="btn btn-primary">Reserve Now</a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Dining Section -->
<div class="container mt-5">
  <h2 class="text-center">Dining at Fortune Hotel</h2>
  <p class="text-center">Experience exquisite cuisine with a variety of dining options to suit every taste.</p>

  <div class="row mt-4 align-items-center">
    <!-- Left Column: Image linked to dining.php -->
    <div class="col-md-6">
      <a href="dining.php">
        <img src="/FortunatusEkenniaPHP/public/images/dining.jpg" class="img-fluid rounded shadow" alt="Dining Area">
      </a>
    </div>
    <!-- Right Column: Textual Details -->
    <div class="col-md-6">
      <h4>Fine Dining Service</h4> 
      <p>
        Taste African and international flavors at Fortune Hotel, Lagos, V.I. 
        The onsite Voyage Restaurant hosts our delicious breakfast buffet and serves up a mix of 
        international and Nigerian options for lunch and dinner. Visit Surface Bar &amp; Grill to enjoy 
        light meals and an extensive drink list while taking in views of Lagos Lagoon. If cocktails by 
        the pool is your thing, then The View Bar is for you. This peaceful spot is well stocked with 
        delicious drinks and tasty snacks. Wherever you choose to eat and drink, our dedicated staff are 
        waiting to serve you with our signature <em>Yes I can!</em> service spirit.
      </p>
      <h4>24/7 Room Service</h4>
      <p>
        Relax in your room and order from our extensive menu anytime, day or night.
      </p>
      <!-- Optional "Learn More" Button -->
      <a href="http://localhost/FortunatusEkenniaPHP/public/dining.php" class="btn btn-outline-primary mt-3">Learn More</a>
    </div>
  </div>
</div>


<!-- Salon Section -->
<div class="container mt-5">
  <h2 class="text-center">Luxury Salon & Spa</h2>
  <p class="text-center">Pamper yourself with our premium beauty and wellness services.</p>
  
  <div class="row mt-4 align-items-center">
    <!-- Left Column: Text & Short Write-Up -->
    <div class="col-md-6">
      <h4>Professional Hair Styling</h4>
      <p>
        Experience expert hair styling from our top-notch professionals who provide tailored cuts, coloring, and styling to suit your individual look.
      </p>
      <h4>Spa & Massage Therapy</h4>
      <p>
        Unwind with our rejuvenating spa treatments, including massages, facials, and holistic therapies designed to relax and revitalize your mind and body.
      </p>
      <p>
        Our salon & spa offers a luxurious and tranquil setting where modern techniques meet a serene ambiance, ensuring an exceptional beauty and wellness experience.
      </p>
      <a href="http://localhost/FortunatusEkenniaPHP/public/salon.php"class="btn btn-outline-primary mt-3">Learn More</a>
    </div>
    <!-- Right Column: Image linking to salon.php -->
    <div class="col-md-6">
      <a href="salon.php">
        <img src="/FortunatusEkenniaPHP/public/images/salon.jpg" class="img-fluid rounded shadow" alt="Salon & Spa">
      </a>
    </div>
  </div>
</div>

<!-- Shopping Section -->
<div class="container mt-5">
  <h2 class="text-center">Hotel Shopping Experience</h2>
  <p class="text-center">Discover luxury brands, souvenirs, and convenience stores right in our hotel.</p>
  
  <div class="row mt-4 align-items-center">
    <!-- Left Column: Text & Short Write-Up -->
    <div class="col-md-6">
      <h4>Luxury Brands & Exclusive Collections</h4>
      <p>
        Explore a curated selection of top international brands and exclusive designer collections that offer a unique blend of sophistication and style.
      </p>
      <h4>Gift & Souvenir Boutique</h4>
      <p>
        Find the perfect keepsake or locally crafted souvenir to remember your stay. From artisanal products to contemporary gifts, our boutique has something for every taste.
      </p>
      <p>
        Enjoy a delightful shopping experience in a stylish environment that complements the luxurious ambiance of our hotel.
      </p>
      <a href="http://localhost/FortunatusEkenniaPHP/public/shopping.php" class="btn btn-outline-primary mt-3">Learn More</a>
    </div>
    <!-- Right Column: Centered Image linking to shop.php -->
    <div class="col-md-6 d-flex justify-content-center">
      <a href="shop.php">
        <img src="/FortunatusEkenniaPHP/public/images/shop.jpg" class="img-fluid rounded shadow" alt="Shopping Area">
      </a>
    </div>
  </div>
</div>

<section class="container mt-5">
  <h2 class="text-center">What Our Guests Say</h2>
  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card p-3">
        <p>"Amazing stay! The rooms were luxurious, and the staff was incredibly friendly."</p>
        <p class="text-end"><strong>- John D.</strong></p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3">
        <p>"The dining experience was exceptional. Highly recommend the Fortune Hotel!"</p>
        <p class="text-end"><strong>- Sarah L.</strong></p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3">
        <p>"Perfect for a relaxing getaway. The spa services were top-notch."</p>
        <p class="text-end"><strong>- Michael T.</strong></p>
      </div>
    </div>
  </div>
</section>


<section class="container mt-5">
  <h2 class="text-center mb-4">Host Your Event With Us</h2>
  
  <!-- Additional Content Above the Image -->
  <div class="text-center mb-4">
    <p class="lead">
      At Fortunatus Hotel, we specialize in creating unforgettable experiences for weddings, conferences, and corporate events. 
      Our versatile event spaces are designed to meet your every need, whether it's an intimate gathering or a grand celebration.
    </p>
    <p>
      From elegant ballrooms to modern conference halls, our team is dedicated to making your event seamless and memorable. 
      Let us handle the details while you focus on enjoying your special occasion.
    </p>
  </div>

  <!-- Centered and Larger Image -->
  <div class="row justify-content-center">
    <div class="col-md-8">
      <img src="/FortunatusEkenniaPHP/public/images/event.jpg" class="img-fluid rounded shadow" alt="Event Hall" style="height: 400px; object-fit: cover;">
    </div>
  </div>

  <!-- Additional Content Below the Image -->
  <div class="text-center mt-4">
    <h4>Why Choose Us?</h4>
    <ul class="list-unstyled">
      <li><i class="fas fa-check text-primary"></i> State-of-the-art facilities with customizable layouts</li>
      <li><i class="fas fa-check text-primary"></i> Dedicated event planning team</li>
      <li><i class="fas fa-check text-primary"></i> On-site catering with customizable menus</li>
      <li><i class="fas fa-check text-primary"></i> Ample parking and easy accessibility</li>
    </ul>
    <p class="mt-3">
      Whether you're planning a wedding, conference, or corporate retreat, our team is here to ensure every detail is perfect. 
      Contact us today to discuss your event requirements and let us bring your vision to life.
    </p>
  </div>
</section>

<section class="container mt-5 bg-light p-4 rounded">
  <h2 class="text-center">Stay Updated</h2>
  <p class="text-center">Subscribe to our newsletter for exclusive offers and updates.</p>
  <form class="mt-3">
    <div class="input-group">
      <input type="email" class="form-control" placeholder="Enter your email" required>
      <button type="submit" class="btn btn-primary">Subscribe</button>
    </div>
  </form>
</section>
<!-- Back to Top Button -->
<button id="backToTop" title="Go to top">▲</button>

<!-- CSS for Styling -->
<style>
    #backToTop {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        font-size: 18px;
        cursor: pointer;
        border-radius: 5px;
        transition: opacity 0.3s ease-in-out;
    }

    #backToTop:hover {
        background-color: #0056b3;
    }
</style>

<!-- JavaScript for Scroll Behavior -->
<script>
    let backToTopBtn = document.getElementById("backToTop");

    // Show button when scrolling down
    window.onscroll = function () {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            backToTopBtn.style.display = "block";
        } else {
            backToTopBtn.style.display = "none";
        }
    };

    // Scroll to top when clicked
    backToTopBtn.onclick = function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    };
</script>





<footer class="mt-5">
    <p>© 2025 Fortunatus Hotel. All rights reserved.</p>
</footer>

<script src="/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
