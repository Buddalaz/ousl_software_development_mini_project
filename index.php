<?php 
    //start the session
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Parlour Management System | Home Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<script src="/assets/js/imageSlider.js"></script> <!-- import imageSlider.js file to index -->
<body>
    <div class="topnav">
        <ul>
            <li><a href="#">Home</a></li>
        </ul>
        <ul>
            <li><a href="about.php">About</a></li>
        </ul>
        <ul>
            <li><a href="service.php">Service</a></li>
        </ul>
        <ul>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <?php if(isset($_SESSION['salonpramodID']) && strlen($_SESSION['salonpramodID']) > 0) { ?>
        <ul>
            <li><a href="booking-appointment.php">Booking</a></li>
        </ul>
        <ul>
            <li><a href="view-bookings.php">View Bookings</a></li>
        </ul>
        <ul>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <?php } else { ?>
        <ul>
            <li><a href="login.php">Login</a></li>
        </ul>
        <ul>
            <li><a href="admin/index.php">Admin</a></li>
        </ul>
        <?php } ?>
    </div>
    <div id="slider">
        <!-- <img src="assets/images/1.jpg" alt="slider 1">
        <img src="assets/images/2.jpg" alt="slider 2"> -->
        <img src="assets/images/4.jpg" alt="slider 3">
    </div>
    <section>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio cupiditate, minima corporis, quam natus laudantium 
            accusamus nobis dolor voluptate voluptatem rerum quis vel accusantium ab, quod cum error repellendus delectus.</p>
    </section>
    <section>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio cupiditate, minima corporis, quam natus laudantium 
            accusamus nobis dolor voluptate voluptatem rerum quis vel accusantium ab, quod cum error repellendus delectus.</p>
    </section>
    <section>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio cupiditate, minima corporis, quam natus laudantium 
            accusamus nobis dolor voluptate voluptatem rerum quis vel accusantium ab, quod cum error repellendus delectus.</p>
    </section>
    <section>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio cupiditate, minima corporis, quam natus laudantium 
            accusamus nobis dolor voluptate voluptatem rerum quis vel accusantium ab, quod cum error repellendus delectus.</p>
    </section>
    <section>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio cupiditate, minima corporis, quam natus laudantium 
            accusamus nobis dolor voluptate voluptatem rerum quis vel accusantium ab, quod cum error repellendus delectus.</p>
    </section>
    <section>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio cupiditate, minima corporis, quam natus laudantium 
            accusamus nobis dolor voluptate voluptatem rerum quis vel accusantium ab, quod cum error repellendus delectus.</p>
    </section>
    <footer>
        <div class="footerDivs">
          <p>&copy;2023 Salon, Inc</p>
          <a href="#">Terms & Conditions</a>
        </div>
        <div class="footerDivs">
          <h5 class="contact"><a href="#">Contact Us</a></h5>
          <p>90/20, joshep Dias lane, Colombo 15</p>
          <p>+94777334477</p>
          <p>SalonPramod@info.com</p>
        </div>
        <div class="footerDivs">
          <h3>Salon Pramod</h3>
        </div>
        <div class="footerDivs"></div>
      </footer>
</body>

</html>