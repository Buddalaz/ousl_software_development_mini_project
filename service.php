<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Parlour Management System | Service Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<script src="/assets/js/imageSlider.js"></script> <!-- import imageSlider.js file to index -->

<body>
    <div class="topnav">
        <ul>
            <li><a href="index.php">Home</a></li>
        </ul>
        <ul>
            <li><a href="about.php">About</a></li>
        </ul>
        <ul>
            <li><a href="#">Service</a></li>
        </ul>
        <ul>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <?php if (isset($_SESSION['salonpramodID']) && strlen($_SESSION['salonpramodID']) > 0) { ?>
            <ul>
                <li><a href="booking-appointment.html">Booking</a></li>
            </ul>
            <ul>
                <li><a href="view-bookings.html">View Bookings</a></li>
            </ul>
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        <?php } else { ?>
            <ul>
                <li><a href="login.php">Login</a></li>
            </ul>
            <ul>
                <li><a href="admin/index.html">Admin</a></li>
            </ul>
        <?php } ?>
    </div>
    <div id="slider">
        <!-- <img src="assets/images/1.jpg" alt="slider 1">
        <img src="assets/images/2.jpg" alt="slider 2"> -->
        <img src="assets/images/4.jpg" alt="slider 3">
        <div class="centered">Our Services</div>
    </div>
    <section class="service-containor">
        <div id="middile-header">
            <h1>We Provide.....</h1>
        </div>
        <div class="grid-view-containor">
            <div class="box">
                <img src="assets/images/5.jpg" alt="example-img">
                <h1>Aroma Oil Massage Therapy</h1>
                <p>Aroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage
                    TherapyAroma
                    Oil Massage</p>
                <h2>Cost of Service:- Rs.1700/-</h2>
            </div>
            <div class="box">
                <img src="assets/images/6.jpg" alt="example-img">
                <h1>Men's hair cut</h1>
                <p>Aroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage
                    TherapyAroma
                    Oil Massage</p>
                <h2>Cost of Service:- Rs.900/-</h2>
            </div>
            <div class="box">
                <img src="assets/images/8.jpg" alt="example-img">
                <h1>Charcol Facial</h1>
                <p>Activated charcoal is created from bone char, coconut shells, peat, petroleum coke, coal, olive pits,
                    bamboo, or sawdust. It is in the form of a fine black dust that is produced when regular charcoal is
                    activated
                    by exposing it to very high temperatures. This is done to alter its internal structure and increase
                    its surface
                    area to increase absorbability. The charcoal that you get after it has undergone this process is
                    very porous. </p>
                <h2>Cost of Service:- Rs.1700/-</h2>
            </div>
            <div class="box">
                <img src="assets/images/10.jpg" alt="example-img">
                <h1>Women's hair cut</h1>
                <p>Aroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage
                    TherapyAroma
                    Oil Massage</p>
                <h2>Cost of Service:- Rs.1000/-</h2>
            </div>
        </div>
    </section>
    <footer>
        <div class="footerDivs">
            <p>&copy;2023 Salon, Inc</p>
            <a href="#">Terms & Conditions</a>
        </div>
        <div class="footerDivs">
            <h5 class="contact"><a href="#">Contact Us</a></h5>
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