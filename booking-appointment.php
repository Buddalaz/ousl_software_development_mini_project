<?php
    session_start();
    
    include('db/dbconnection.php');
    
    if (isset($_POST['submit'])) {
        //variable init form user input data
        $uId= $_SESSION['salonpramodID'];
        $aptDate = $_POST['aptDate'];
        $aptTime = $_POST['aptTime'];
        $msg = $_POST['msg'];
        $status = 'Pending';

        $ret = mysqli_query($connection, "insert into tblbookings(UserID, AptDate, AptTime, Message, Status) 
        value('$uId', '$aptDate','$aptTime', '$msg', '$status')");

        // $result = mysqli_fetch_array($ret);

        if ($ret) {
            echo "<script>alert('Booking Appoinment Successfully!!!!');</script>";
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
    <title>Beauty Parlour Management System | Appointment Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
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
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <?php if (isset($_SESSION['salonpramodID']) && strlen($_SESSION['salonpramodID']) > 0) { ?>
            <ul>
                <li><a href="#">Booking</a></li>
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

    <section style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px;">
        <form action="" method="POST" style="width: 500px;">
            <label>Appointment Date</label><br />
            <input type="date" name="aptDate" class="con-input"><br />
            <label>Appointment Time</label><br />
            <input type="time" name="aptTime" class="con-input"><br />
            <textarea class="form-control" name="msg" placeholder="Message" required="" style="width: 300px; height: 100px;"></textarea><br />
            <input type="submit" value="Submith" name="submit" class="con-btn">
        </form>
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