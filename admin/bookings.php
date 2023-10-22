<?php
    session_start();

    include('../db/dbconnection.php');
?>
<div class="content-to-load">
    <!-- Your content goes here -->
    <h1>Hello i'm Bookings content</h1>
    <div style="margin: 5px; padding: 10px;">
        <table class="tbl-ste">
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Appoinment Date</th>
                <th>Appoinment Time</th>
                <th>Message</th>
                <th>Booking Approve Date & Time</th>
                <th>Remark</th>
                <th>Status</th>
                <th>Remark Date & Time</th>
                <th>Action</th>
            </tr>
            <tr>
                <?php
                $userid = $_SESSION['salonpramodID'];
                $query = mysqli_query($connection, "SELECT tu.FirstName,tb.AptDate,tb.AptTime,tb.Message,tb.BookingDate,tb.Remark,tb.Status,tb.RemarkDate FROM tblbookings AS tb INNER JOIN tbluser AS tu on tb.UserID = tu.UserID");
                $cnt = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['AptDate']; ?></td>
                <td>
                    <p> <?php echo $row['AptTime']; ?> </p>
                </td>
                <td><?php echo $row['Message']; ?></td>
                <td><?php echo $row['BookingDate']; ?></td>
                <td><?php $remark = $row['Remark']; 
                    if ($remark == "") {
                        echo "Not yet update";
                    } else {
                        echo $remark;
                    }
                ?></td>
                <td><?php $status = $row['Status'];
                    if ($status == "") {
                        echo "Waiting for confirmation";
                    } else {
                        echo $status;
                    }
                    ?> </td>
                <td><?php echo $row['RemarkDate'] ?></td>
                <td>
                    <span class="icon"><i class="fas fa-user-shield"></i></span>
                    <span class="icon"><i class="fas fa-user-shield"></i></span>
                </td>
            </tr><?php $cnt = $cnt + 1;
                } ?>
        </table>
    </div>
</div>