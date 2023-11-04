<?php

    session_start();

    include('../db/dbconnection.php');

    $bookingId = $_GET['bid'];

    // echo $bookingId;

    $result = mysqli_query($connection,"UPDATE tblbookings SET Remark='Your appointment has been Rejected Due to selected date are full.', Status='Rejected' WHERE BookId='$bookingId'");

    if($result > 0){
        echo "<script>alert('Booking Successfully Updated!!!!');</script>";
    }else{
        echo "<script>alert('Something Wrong!!!!');</script>";
        // header('location:dashboard.php');
    }
    header('location:dashboard.php');
?>