<?php
session_start();

include('db/dbconnection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Bookings</title>
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
        <li><a href="#">View Bookings</a></li>
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
    <img src="assets/images/4.jpg" alt="slider 3">
  </div>

  <div class="viewBookingContent">
    <h1>Appoinment History</h1>
    <div class="tblContent">
      <table class="tbl-ste">
        <tr>
          <th>No</th>
          <th>Appoinment Date</th>
          <th>Appoinment Time</th>
          <th>Message</th>
          <th>Booking Approve Date & Time</th>
          <th>Remark</th>
          <th>Status</th>
          <th>Remark Date & Time</th>
        </tr>
        <tr>
          <?php
          $userid = $_SESSION['salonpramodID'];
          $query = mysqli_query($connection, "SELECT tb.AptDate,tb.AptTime,tb.Message,tb.BookingDate,tb.Remark,tb.Status,tb.RemarkDate FROM tblbookings AS tb INNER JOIN tbluser AS tu on tb.UserID = tu.UserID WHERE tu.UserID = '$userid'");
          $cnt = 1;
          while ($row = mysqli_fetch_array($query)) { ?>
        <tr>
          <td><?php echo $cnt; ?></td>
          <td><?php echo $row['AptDate']; ?></td>
          <td>
            <p> <?php echo $row['AptTime'] ?> </p>
          </td>
          <td><?php echo $row['Message'] ?></td>
          <td><?php echo $row['BookingDate'] ?></td>
          <td><?php echo $row['Remark'] ?></td>
          <td><?php $status = $row['Status'];
              if ($status == '') {
                echo "Waiting for confirmation";
              } else {
                echo $status;
              }
              ?> </td>
          <td><?php echo $row['RemarkDate'] ?></td>
        </tr><?php $cnt = $cnt + 1;
            } ?>
      </table>
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