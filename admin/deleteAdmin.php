<?php

    session_start();

    include('../db/dbconnection.php');

    $adminId = $_GET['aid'];

    // echo $bookingId;

    $result = mysqli_query($connection,"DELETE FROM tbladmin WHERE AdminId='$adminId'");

    if($result > 0){
        echo "<script>alert('Admin Delete Successfully!!!!');</script>";
        echo "<script>window.location.href ='dashboard.php'</script>";
    }else{
        echo "<script>alert('Something Wrong!!!!');</script>";
        echo "<script>window.location.href ='dashboard.php'</script>";
    }
    // header('location:dashboard.php');
?>