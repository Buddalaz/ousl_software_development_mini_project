<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to index page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

  require_once('../db/dbconnection.php');

  $errors = array();

  $proName = '';
  $retName = '';
  $retAddress = '';
  $conNum = '';
  $purDate = '';
  $expDate = '';
  $quentity = '';
  $retEa = '';

  // Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $proName = $_POST['pro_name'];
  $retName = $_POST['ret_name'];
  $retAddress = $_POST['ret_address'];
  $conNum = $_POST['con_num'];
  $purDate = $_POST['pur_date'];
  $expDate = $_POST['exp_date'];
  $quentity = $_POST['quentity'];
  $retEa = $_POST['reta_ea'];
  
      // Prepare an insert statement
      $query = "INSERT INTO retailer (product_name, retailer_name, retailer_address, contact_number, purchese_date, expiry_date, quentity	, retailer_ea) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
       
      if($stmt = mysqli_prepare($connection, $query)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "ssssssss", $param_proName, $param_retname, $param_retAddress, $param_conNum, $param_purDate, $param_expDate, $param_quent, $param_retEa);
          
          // Set parameters
          $param_proName = $proName;
          $param_retname = $retName;
          $param_retAddress = $retAddress;
          $param_conNum = $conNum;
          $param_purDate = $purDate;
          $param_expDate = $expDate;
          $param_quent = $quentity;
          $param_retEa = $retEa;
          
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              // Records created successfully. Redirect to landing page
              header("location: retailer.php");
              exit();
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
      }
       
      // Close statement
      mysqli_stmt_close($stmt);
  // }
  
  // Close connection
  mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <title>Administration</title>
</head>

<body>
  <div class="mainContainer">
    <div class="navBar">
      <div class="logo">
        <h3><a href="#">Costa Biscuit</a></h3>
      </div>
      <div class="navigations">
        <a href="../directions/admin.php">Company</a>
        <a href="../directions/distributer.php">Distributer</a>
        <a href="#">Retailer</a>
      </div>
      <div class="signUpDiv">
        <p><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></p>
        <a class="logIn" href="logout.php">Log Out</a>
      </div>
    </div>
    <div class="titleText">
      <div class="mainText">
        <h3>Retailer Detail Page</h3>
      </div>
      <div>
        <h4>All the fields are required.</h4>
      </div>
    </div>

    <div class="adminSection">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <input type="text" placeholder="Product Name" name="pro_name" /><br />
          <input type="text" placeholder="Retailer Name" name="ret_name" /><br />
          <input type="text" placeholder="Retailer Address" name="ret_address"  /><br />
          <input type="text" placeholder="Contact Number" name="con_num" /><br />
          <label>Purchese Date</label><br />
          <input type="date" placeholder="Purchese Date" name="pur_date" /><br />
          <label>Expiry Date</label><br />
          <input type="date" placeholder="Expiry Date" name="exp_date" /><br />
          <input type="text" placeholder="Quentity" name="quentity" /><br />
          <input type="text" placeholder="Retailer Ea" name="reta_ea" /><br />
          <div>
            <button id="addBtn" class="btn" type="submit" name="submit">Add</button>
          </div>
      </form>
      <div style="margin-left: 97px;">
          <?php
                    // Include config file
                    require_once "../db/dbconnection.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM retailer";
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table style="border-collapse: collapse;">';
                                echo "<thead style='width: 25%;'>";
                                    echo "<tr>";
                                        // echo "<th style='border: 1px solid black; width: 25%;'>#</th>";
                                        echo "<th style='border: 1px solid black; width: 15%;'>Product Name</th>";
                                        echo "<th style='border: 1px solid black; width: 15%;'>Retailer Name</th>";
                                        echo "<th style='border: 1px solid black; width: 15%;'>Retailer Address</th>";
                                        echo "<th style='border: 1px solid black; width: 10%;'>Contact Number</th>";
                                        echo "<th style='border: 1px solid black; width: 15%;'>Purchese Date</th>";
                                        echo "<th style='border: 1px solid black; width: 15%;'>Expiry Date</th>";
                                        echo "<th style='border: 1px solid black; width: 15%;'>Quentity</th>";
                                        echo "<th style='border: 1px solid black; width: 15%;'>Retailer Ea</th>";
                                        echo "<th style='border: 1px solid black; width: 15%;'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        // echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['retailer_id'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['product_name'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['retailer_name'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['retailer_address'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['contact_number'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['purchese_date'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['expiry_date'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['quentity'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['retailer_ea'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>";
                                            echo '<a href="updateRetailer.php?id='. $row['retailer_id'] .'" style="padding: 8px;">Update</a>';
                                            echo '<a href="deleteRetailer.php?id='. $row['retailer_id'] .'">Delete</a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($connection);
                    ?>
      </div>
    </div>
    <footer>
      <div class="footerDivs">
        <p>&copy;2022 costa biscuts, Inc</p>
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
