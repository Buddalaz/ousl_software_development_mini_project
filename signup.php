<?php
  session_start();

  include('db/dbconnection.php');

  if (isset($_POST['submit'])) {
    //variable init form user input data
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $mobileNumber = $_POST['mobileNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $ret = mysqli_query($con, "select Email from tbluser where Email='$email'");
    $result = mysqli_fetch_array($ret);
    if ($result > 0) {
      echo "<script>alert('This email or Contact Number already associated with another account!.');</script>";
    } else {
      $query = mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$mobileNumber', '$email', '$password' )");
      if ($query) {
        echo "<script>alert('You have successfully registered.');</script>";
        header('location:index.php');
      } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUp Page</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <form action="signup.php" method="POST">
    <div class="imgcontainer">
      <img src="#" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="psw"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="fName" required>

      <label for="psw"><b>Last Name</b></label>
      <input type="text" placeholder="Enter First Name" name="lName" required>

      <label for="psw"><b>Mobile Number</b></label>
      <input type="text" placeholder="Enter Mobile Number" name="mobileNumber" pattern="[0-9]+" maxlength="10" required>

      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <button type="submit" name="submit">Login</button>
      <!-- <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label> -->
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn"><a href="index.php">Cancel</a></button>
      <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
    </div>
  </form>
</body>

</html>