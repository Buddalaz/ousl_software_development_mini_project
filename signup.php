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

    $ret = mysqli_query($connection, "select Email from tbluser where Email='$email'");
    $result = mysqli_fetch_array($ret);
    if ($result > 0) {
      echo "<script>alert('This email or Contact Number already associated with another account!.');</script>";
    } else {
      $query = mysqli_query($connection, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$mobileNumber', '$email', '$password' )");
      if ($query) {
        echo "<script>alert('You have successfully registered.');</script>";
        header('location:login.php');
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
  <div class="signUpHeader">
    <h1>Welcome TO Sign Up Page</h1>
  </div>
  <form action="signup.php" method="POST">
    <div class="signUpContainer">
      <label for="psw"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="fName" required><br>

      <label for="psw"><b>Last Name</b></label>
      <input type="text" placeholder="Enter First Name" name="lName" required><br>

      <label for="psw"><b>Mobile Number</b></label>
      <input type="text" placeholder="Enter Mobile Number" name="mobileNumber" pattern="[0-9]+" maxlength="10" required><br>

      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required><br>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required><br>

      <button class="signUpBtn" type="submit" name="submit">Register</button>
      <button class="signUpBtn" type="button" class="cancelbtn"><a href="login.php">Cancel</a></button>
    </div>
  </form>
</body>

</html>