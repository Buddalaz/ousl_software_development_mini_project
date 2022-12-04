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

  $disId = '';
  $proId = '';
  $manuDate = '';
  $expDate = '';
  $graType = '';
  $dateSold = '';
  $quentity = '';
  $shipCred = '';
  $disEa = '';

  // Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $disId = $_POST['dis_Id'];
  $proId = $_POST['pro_id'];
  $manuDate = $_POST['man_date'];
  $expDate = $_POST['exp_date'];
  $graType = $_POST['gra_type'];
  $dateSold = $_POST['date_sold'];
  $quentity = $_POST['que_sold'];
  $shipCred = $_POST['ship_cre'];
  $disEa = $_POST['dis_ea'];
  
      // Prepare an insert statement
      $query = "INSERT INTO distributer (product_id, manufactuer_date, expiry_date, grain_type, date_sold, 	quentity_sold, shipment_credentials	, distributer_ea) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
       
      if($stmt = mysqli_prepare($connection, $query)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "ssssssss", $param_proid, $param_manudate, $param_expdate, $param_gratype, $param_datesold, $param_quent, $param_shipcard, $param_disea);
          
          // Set parameters
          $param_disid = $disId;
          $param_proid = $proId;
          $param_manudate = $manuDate;
          $param_expdate = $expDate;
          $param_gratype = $graType;
          $param_datesold = $dateSold;
          $param_quent = $quentity;
          $param_shipcard = $shipCred;
          $param_disea = $disEa;
          
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              // Records created successfully. Redirect to landing page
              header("location: distributer.php");
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
        <a href="#">Distributer</a>
        <a href="../directions/retailer.php">Retailer</a>
      </div>
      <div class="signUpDiv">
        <p><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></p>
        <a class="logIn" href="logout.php">Log Out</a>
      </div>
    </div>
    <div class="titleText">
      <div class="mainText">
        <h3>Distributer Detail Page</h3>
      </div>
      <div>
        <h4>All the fields are required.</h4>
      </div>
    </div>

    <div class="adminSection">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <input type="hidden" placeholder="Distributer id" name="dis_Id" /><br />
          <input type="text" placeholder="Product id" name="pro_id" /><br />
          <label>Manufacture Date</label><br />
          <input type="date" name="man_date"  /><br />
          <label>Expiry Date</label><br />
          <input type="date" name="exp_date" /><br />
          <input type="text" placeholder="Grain type" name="gra_type" /><br />
          <input type="date" placeholder="Date Sold" name="date_sold" /><br />
          <input type="text" placeholder="Quantity Sold" name="que_sold" /><br />
          <input type="text" placeholder="Shipment Credentials" name="ship_cre" /><br />
          <input type="text" placeholder="Distributer Ea" name="dis_ea" /><br />
          <div>
            <button id="addBtn" class="btn" type="submit" name="submit">Add</button>
          </div>
      </form>
      <div style="margin-left: 97px;">
          <?php
                    // Include config file
                    require_once "../db/dbconnection.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM distributer";
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table style="border-collapse: collapse;">';
                                echo "<thead style='width: 25%;'>";
                                    echo "<tr>";
                                        // echo "<th style='border: 1px solid black; width: 8%;'>#</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Product Id</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Manufacture Date</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Expiry Date</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Grain Type</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Date Sold</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>quentity</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Shipment Credentials</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Distributer Ea</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        // echo "<td style='border: 1px solid black;'>" . $row['distributer_id'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['product_id'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['manufactuer_date'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['expiry_date'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['grain_type'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['date_sold'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['quentity_sold'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['shipment_credentials'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['distributer_ea'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>";
                                            echo '<a href="updateDistributer.php?id='. $row['distributer_id'] .'" style="padding: 8px;">Update</a>';
                                            echo '<a href="deleteDistributer.php?id='. $row['distributer_id'] .'" >Delete</a>';
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
