<?php
session_start();

include('../db/dbconnection.php');

if (isset($_POST['submit'])) {
    //variable init form user input data
    // $uId= $_SESSION['salonpramodID'];
    $adName = $_POST['adminName'];
    $adUserName = $_POST['adminUserName'];
    $adMobileNumber = $_POST['adminMobileNumber'];
    $adEmail = $_POST['adminEmail'];
    $adPassword = $_POST['adminPassword'];
    // $status = 'Pending';

    $ret = mysqli_query($connection, "INSERT INTO tbladmin(AdminName, UserName, MobileNumber, Email, Password) value('$adName', '$adUserName','$adMobileNumber', '$adEmail', '$adPassword')");

    // // $result = mysqli_fetch_array($ret);

    if ($ret) {
        echo "<script>alert('Admin Add Successfully!!!!');</script>";
        echo "<script>window.location.href ='dashboard.php'</script>";
        // header('location:dashboard.php');
    } else {
        // mysqli_error($ret);
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
?>
<div class="content-to-load">
    <!-- form here -->
    <div style="border-style: solid;">
        <h2 style="padding: 5px;">Add New AdminUser</h2>
        <form style="display: flex; flex-direction: row; flex-wrap: wrap;" action="admins.php" method="POST">
            <div style="margin: 10px; display: flex; flex-direction: column;">
                <label style="margin-bottom: 5px;" for="name">Admin Name:</label>
                <input style="padding: 5px; margin: 5px 0;" type="text" id="adminName" name="adminName">
            </div>
            <div style="margin: 10px; display: flex; flex-direction: column;">
                <label style="margin-bottom: 5px;" for="email">User Name:</label>
                <input style="padding: 5px; margin: 5px 0;" type="text" id="adminUserName" name="adminUserName">
            </div>
            <div style="margin: 10px; display: flex; flex-direction: column;">
                <label style="margin-bottom: 5px;" for="message">Mobile Number:</label>
                <input style="padding: 5px; margin: 5px 0;" type="text" id="adminMobileNumber" name="adminMobileNumber"></input>
            </div>
            <div style="margin: 10px; display: flex; flex-direction: column;">
                <label style="margin-bottom: 5px;" for="message">Email:</label>
                <input style="padding: 5px; margin: 5px 0;" type="email" id="adminEmail" name="adminEmail"></input>
            </div>
            <div style="margin: 10px; display: flex; flex-direction: column;">
                <label style="margin-bottom: 5px;" for="message">Password:</label>
                <input style="padding: 5px; margin: 5px 0;" type="password" id="adminPassword" name="adminPassword"></input>
            </div>
            <div>
                <button style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; cursor: pointer; margin-top:30px;" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
    <!-- admin table view-->
    <div style="margin: 5px; padding: 10px;">
        <table class="tbl-ste">
            <tr>
                <th>No</th>
                <th>Admin Name</th>
                <th>User Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Register Date</th>
                <th>Action</th>
            </tr>
            <tr>
                <?php
                $query = mysqli_query($connection, "SELECT ta.AdminId AS aid,ta.AdminName,ta.UserName,ta.MobileNumber,ta.Email,ta.AdminRegdate FROM tbladmin AS ta");
                $cnt = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['AdminName']; ?></td>
                <td><?php echo $row['UserName']; ?></td>
                <td><?php echo $row['MobileNumber']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td>
                    <p><?php echo $row['AdminRegdate']; ?></p>
                </td>
                <td>
                    <!-- <span class="icon"><i class="fa-solid fa-trash-can"></i></span> -->
                    <a href="deleteAdmin.php?aid=<?php echo $row['aid']; ?>" class="icon"><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr><?php $cnt = $cnt + 1;
                } ?>
        </table>
    </div>
</div>