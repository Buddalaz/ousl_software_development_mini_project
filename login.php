<?php

//start the session
session_start();
//include dbconnection.php file to login.php file
include('db/dbconnection.php');

//check the button is clicked
if (isset($_POST['submit'])) {
  //declare and getting the user input data to variables 
  $emailcon = $_POST['email'];
  $password = $_POST['password'];

  $query = mysqli_query($connection, "select UserID from tbluser where Email='$emailcon' AND Password='$password'");

  $ret = mysqli_fetch_array($query);

  if ($ret > 0) {
    $_SESSION['salonpramodID'] = $ret['UserID'];
    header('location:index.php');
  } else {
    echo "<script>alert('Invalid Details.');</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="assets/css/style.css">
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
      <li><a href="contact.php">Contact</a></li>
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
        <li><a href="#">Login</a></li>
      </ul>
      <ul>
        <li><a href="admin/index.php">Admin</a></li>
      </ul>
    <?php } ?>
  </div>
  <div class="loginContainer">
    <div class="loginSection">
      <div class="formImageDiv">
        <img class="formImage" src="assets/images/7.jpg" alt="form" />
      </div>
      <form class="formDiv" action="login.php" method="POST">
        <h3>Connect with us to stay upto date .</h3>
        <p>
          Bieng a member let you recive offers that got released time to
          time.
        </p>
        <div class="inputs">
          <input class="inputText" type="text" placeholder="Email" name="email" /><br />
          <input class="inputText" type="password" placeholder="password" name="password" /><br />
        </div>
        <a href="signup.php">Dont have an account? SignUp</a>
        <button class="btn" type="submit" name="submit">Login</button>
      </form>
    </div>
  </div>
  <!-- <footer>
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
  </footer> -->
</body>

</html>