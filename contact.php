<?php
session_start();

include('db/dbconnection.php');

if (isset($_POST['submit'])) {
    //variable init form user input data
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $mobileNumber = $_POST['mobileNumber'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $ret = mysqli_query($connection, "insert into tblcontact(FirstName, LastName, Phone, Email, Message) value('$fname', '$lname','$mobileNumber', '$email', '$msg')");

    // $result = mysqli_fetch_array($ret);

    if ($ret) {
        echo "<script>alert('Thank you for contact us.');</script>";
        // header('location:index.php');
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Parlour Management System | Contact Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script src="/assets/js/imageSlider.js"></script> import imageSlider.js file to index -->
    <script src="assets/js/testfile.js"></script>
    <script src="https://kit.fontawesome.com/0996a09043.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="topnav">
        <ul>
            <li><a href="index.php">Home</a></li>
        </ul>
        <ul>
            <li><a href="about.php">About</a></li>
        </ul>
        <ul>
            <li><a href="service.php">Service</a></li>
        </ul>
        <ul>
            <li><a href="#">Contact</a></li>
        </ul>
        <?php if (isset($_SESSION['salonpramodID']) && strlen($_SESSION['salonpramodID']) > 0) { ?>
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
    <div class="con-main-cont">
        <div class="mini-sec">
            <section>
                <ul>
                    <li>
                        <i class="fa-solid fa-mobile-retro"></i>
                        <h1>Call Us</h1>
                        <p>0112524789</p>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope-circle-check"></i>
                        <h1>Email Us</h1>
                        <p>SalonPramod@info.com</p>
                    </li>
                    <li>
                        <h1>Address</h1>
                        <p>90/20, joshep dias lane, colombo 15</p>
                    </li>
                    <li>
                        <h1>Time</h1>
                        <p>We are open 10.00 am to 10.00 pm</p>
                    </li>
                </ul>
            </section>
            <section>
                <form action="contact.php" method="POST">
                    <input type="text" name="fName" placeholder="First Name" class="con-input"><br />
                    <input type="text" name="lName" placeholder="Last Name" class="con-input"><br />
                    <input type="text" name="mobileNumber" placeholder="Phone" class="con-input"><br />
                    <input type="text" name="email" placeholder="Email" class="con-input"><br />
                    <input type="text" name="msg" placeholder="Message" class="con-input"><br />
                    <input type="submit" value="Submith" name="submit" class="con-btn">
                </form>
            </section>
        </div>
    </div>
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