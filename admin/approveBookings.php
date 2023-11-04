<?php

    session_start();

    include('../db/dbconnection.php');

    $bookingId = $_GET['bid'];

    echo $bookingId;

    $result = mysqli_query($connection,"UPDATE tblbookings SET Remark='Your appointment has been book.', Status='Selected' WHERE BookId='$bookingId'");

    if($result > 0){
        echo "<script>alert('Booking Successfully Updated!!!!');</script>";
        header('location:dashboard.php');
    }else{
        echo "<script>alert('Something Wrong!!!!');</script>";
        header('location:dashboard.php');
    }
?>