<?php

  //start the session
  session_start();
  //include dbconnection.php file to login.php file
  include('../db/dbconnection.php');

  //check the button is clicked
  if (isset($_POST['submit'])) {
    //declare and getting the user input data to variables 
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $query = mysqli_query($connection, "select AdminId,AdminName from tbladmin where UserName='$userName' AND Password='$password'");

    $ret = mysqli_fetch_array($query);

    if ($ret > 0) {
      $_SESSION['salonpramodID'] = $ret['AdminId'];
      $_SESSION['adminName'] = $ret['AdminName'];
      header('location:dashboard.php');
    } else {
      echo "<script>alert('Invalid Details.');</script>";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Loging</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <div class="topnav">
    <ul>
      <li><a href="#"></a></li>
    </ul>
    <ul>
      <li>
        <h1 style="color: white;">Admin Panel Of the Salon Pramod</h1>
      </li>
    </ul>
  </div>
  <div class="loginContainer">
    <div class="loginSection">
      <div class="formImageDiv">
        <img class="formImage" src="../assets/images/7.jpg" alt="form" />
      </div>
      <form class="formDiv" action="#" method="POST">
        <h3>Welcome Admin</h3>
        <p>
          You must have credentials to log before the admin. If you don't have please contact the Admin
        </p>
        <div class="inputs">
          <input class="inputText" type="text" placeholder="User Name" name="userName" /><br />
          <input class="inputText" type="password" placeholder="Password" name="password" /><br />
        </div>
        <button class="btn" type="submit" name="submit">Login</button>
      </form>
    </div>
  </div>
</body>

</html>