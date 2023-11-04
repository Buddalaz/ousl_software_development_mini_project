<?php

    session_start();

    include('../db/dbconnection.php');

    $conId = $_GET['conId'];

    // echo $bookingId;

    $result = mysqli_query($connection,"DELETE FROM tblcontact WHERE ID='$conId'");

    if($result > 0){
        echo "<script>alert('Contact Delete Successfully!!!!');</script>";
        echo "<script>window.location.href ='dashboard.php'</script>";
    }else{
        echo "<script>alert('Something Wrong!!!!');</script>";
        echo "<script>window.location.href ='dashboard.php'</script>";
    }
    // header('location:dashboard.php');
?>