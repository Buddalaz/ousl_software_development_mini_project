<?php
    session_start();
    include('../db/dbconnection.php');
?>
<div class="content-to-load">
    <!-- Your content goes here -->
    <h1>Hello i'm customer content</h1>
    <div style="margin: 5px; padding: 10px;">
        <table class="tbl-ste">
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Register Date</th>
                <th>Action</th>
            </tr>
            <tr>
                <?php
                $query = mysqli_query($connection, "SELECT tu.FirstName,tu.LastName,tu.MobileNumber,tu.Email,tu.RegDate FROM tbluser AS tu");
                $cnt = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['LastName']; ?></td>
                <td><?php echo $row['MobileNumber']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td>
                    <p><?php echo $row['RegDate']; ?></p>
                </td>
                <td>
                    <span class="icon"><i class="fas fa-user-shield"></i></span>
                </td>
            </tr><?php $cnt = $cnt + 1;
                } ?>
        </table>
    </div>
</div>