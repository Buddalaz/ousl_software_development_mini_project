<?php
    session_start();

    include('../db/dbconnection.php');
?>
<div class="content-to-load">
    <!-- Your content goes here -->
    <h1>Hello i'm Contacts content</h1>
    <div style="margin: 5px; padding: 10px;">
        <table class="tbl-ste">
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Message</th>
                <th>Enquiry Date</th>
                <th>Action</th>
            </tr>
            <tr>
                <?php
                $userid = $_SESSION['salonpramodID'];
                $query = mysqli_query($connection, "SELECT tc.FirstName,tc.LastName,tc.Phone,tc.Email,tc.Message,tc.EnquiryDate FROM tblcontact AS tc");
                $cnt = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['LastName']; ?></td>
                <td><?php echo $row['Phone']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Message']; ?></td>
                <td>
                    <p><?php echo $row['EnquiryDate']; ?></p>
                </td>
                <td>
                    <span class="icon"><i class="fas fa-user-shield"></i></span>
                </td>
            </tr><?php $cnt = $cnt + 1;
                } ?>
        </table>
    </div>
</div>