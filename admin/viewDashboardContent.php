<?php
    session_start();
    include('../db/dbconnection.php');

    $adminCountResult  = mysqli_query($connection, "SELECT COUNT(*) FROM tbladmin");
    $bookingsCountResult = mysqli_query($connection, "SELECT COUNT(*) FROM tblbookings");
    $userCountResult = mysqli_query($connection, "SELECT COUNT(*) FROM tbluser");

     // Check if the queries executed successfully
     if ($adminCountResult && $bookingsCountResult && $userCountResult) {
        // Fetch the count values
        $adminCount = mysqli_fetch_row($adminCountResult)[0];
        $bookingsCount = mysqli_fetch_row($bookingsCountResult)[0];
        $userCount = mysqli_fetch_row($userCountResult)[0];

        // Free the result sets
        mysqli_free_result($adminCountResult);
        mysqli_free_result($bookingsCountResult);
        mysqli_free_result($userCountResult);

    } else {
        echo "Error executing the queries: " . mysqli_error($connection);
    }
?>
<div class="content-to-load">
    <!-- Your content goes here -->
    <h1>Hello i'm Default content</h1>
    <div style="display: flex; flex-direction: row; justify-content:space-between; margin-top: 5px;">
        <div style="width: 350px; height: 100px; background-color:blue;">
            <h3>Booking Count</h3>
            <h1 style="text-align: center;"><?php echo $bookingsCount; ?></h1>
        </div>
        <div style="width: 350px; height: 100px; background-color:blue;">
            <h3>Customer Count</h3>
            <h1 style="text-align: center;"><?php echo $userCount; ?></h1>
        </div>
        <div style="width: 350px; height: 100px; background-color:blue;">
            <h3>Admin Count</h3>
            <h1 style="text-align: center;"><?php echo $adminCount; ?></h1>
        </div>
    </div>
</div>