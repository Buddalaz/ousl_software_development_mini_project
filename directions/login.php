<?php 

    // Initialize the session
    session_start();

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin.php");
    exit;
    }

    // require_once('../db/dbconnection.php');
    require_once "../db/dbconnection.php";

    if (isset($_POST['submit'])) {
      $errors = array();

      if (!isset($_POST['username']) || strlen(trim($_POST['username'])) < 1) {
          $errors[] = 'Username is Missing/Invalid';
      }

      if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
          $errors[] = 'Password is Missing/Invalid';
      }

      if (empty($errors)) {
        $username =  mysqli_real_escape_string($connection, $_POST['username']);  
        $password =  mysqli_real_escape_string($connection, $_POST['password']);

        $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";

        $result_set = mysqli_query($connection, $query);

        if ($result_set) {
          if (mysqli_num_rows($result_set) == 1) {
            session_start();
                            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;  
            
            header('Location: admin.php');
          }else{
            $errors[] = 'invalid username/password';
          }
        }else{
          $errors[] = 'Database query failed!';
        }

      }else{
        echo 'something went wrong';
      }
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Ephesis&display=swap" rel="stylesheet" />
  <title>Art Ceylon</title>
</head>

<body>
  <div class="mainContainer">
    <div class="navBar">
      <div class="logo">
        <h3><a href="../index.php">COSTA BISCUIT</a></h3>
      </div>
    </div>
    <div class="titleText">
      <div class="mainText">
        <h3>Let's connect,</h3>
      </div>
      <div class="subText">
        <h4>Being a member have plenty of perks.</h4>
      </div>
    </div>
    <div class="loginContainer">
      <div class="loginSection">
        <form class="formDiv" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <h3>Connect with us to stay upto date .</h3>
          <p>
            Bieng a member let you recive offers that got released time to
            time.
          </p>
          <div class="inputs">
            <input class="inputText" type="text" placeholder="Email" name="username"/><br />
            <input class="inputText" type="password" placeholder="password" name="password"/><br />
            <!-- show if errors are set and errors are not empty -->
            <?php 
              if (isset($errors) && !empty($errors)) {
                echo '<p class="error">Invalid Username / Password</p>';
              }
            ?>
          </div>
          <button class="btn" type="submit" name="submit">Login</button>
        </form>
      </div>
    </div>
    <footer>
      <div class="footerDivs">
        <p>&copy;2022 artCeylon, Inc</p>
        <a href="#">Terms & Conditions</a>
      </div>
      <div class="footerDivs">
        <h5 class="contact"><a href="#">Contact Us</a></h5>
        <p>+94777334477</p>
        <p>Costa.Biscuit@info.com</p>
      </div>
      <div class="footerDivs">
        <h3>Costa Biscuit</h3>
      </div>
      <div class="footerDivs"></div>
    </footer>
  </div>
</body>
</html>

<?php mysqli_close($connection) ?>