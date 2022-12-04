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

  $com_supp_id = '';
  $com_name = '';
  $lot_coordinates = '';
  $ingre_type = '';
  $cer_age = '';
  $varity = '';

  // Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $com_supp_id = $_POST['company_supplier_id'];
  $com_name = $_POST['company_name'];
  $lot_coordinates = $_POST['lot_coordinates'];
  $ingre_type = $_POST['ingredient_type'];
  $cer_age = $_POST['certifiying_agency'];
  $varity = $_POST['variety'];
  
      // Prepare an insert statement
      $query = "INSERT INTO company (company_name, lot_coordinates, ingredient_type, certifiying_agency, variety) VALUES (?, ?, ?, ?, ?)";
       
      if($stmt = mysqli_prepare($connection, $query)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "sssss", $param_comname, $param_lotcoor, $param_ingtype, $param_cerAge, $param_var);
          
          // Set parameters
          $param_comname = $com_name;
          $param_lotcoor = $lot_coordinates;
          $param_ingtype = $ingre_type;
          $param_cerAge = $cer_age;
          $param_var = $varity;
          
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              // Records created successfully. Redirect to landing page
              header("location: admin.php");
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
        <a href="#">Company</a>
        <a href="../directions/distributer.php">Distributer</a>
        <a href="../directions/retailer.php">Retailer</a>
      </div>
      <div class="signUpDiv">
        <p><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></p>
        <a class="logIn" href="logout.php">Log Out</a>
      </div>
    </div>
    <div class="titleText">
      <div class="mainText">
        <h3>Company Detail Page</h3>
      </div>
      <div>
        <h4>All the fields are required.</h4>
      </div>
    </div>

    <div class="adminSection">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <!-- <input type="text" placeholder="Company Supplier Id" name="company_supplier_id" /><br /> -->
          <input type="text" placeholder="Company Name" name="company_name" /><br />
          <input type="text" placeholder="Lot Coordinates" name="lot_coordinates"  /><br />
          <input type="text" placeholder="Ingredient Type" name="ingredient_type" /><br />
          <input type="text" placeholder="Certiying Agency" name="certifiying_agency" /><br />
          <input type="text" placeholder="Variety" name="variety" /><br />
          <div>
            <button id="addBtn" class="btn" type="submit" name="submit">Add</button>
          </div>
      </form>
      <div style="margin-left: 97px;">
        <?php
                    // Include config file
                    require_once "../db/dbconnection.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM company";
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table style="border-collapse: collapse;">';
                                echo "<thead style='width: 25%;'>";
                                    echo "<tr>";
                                        // echo "<th style='border: 1px solid black; width: 25%;'>#</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Company Name</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>lot coordinates</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>ingrediant Types</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Certifing Agency</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Variety</th>";
                                        echo "<th style='border: 1px solid black; width: 25%;'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        // echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['company_supplier_id'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['company_name'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['lot_coordinates'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['ingredient_type'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['certifiying_agency'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['variety'] . "</td>";
                                        echo "<td style='border: 1px solid black; padding: 8px;'>";
                                            echo '<a href="updateCompany.php?id='. $row['company_supplier_id'] .'" style="padding: 8px;">Update</a>';
                                            echo '<a href="deleteCompany.php?id='. $row['company_supplier_id'] .'">Delete</a>';
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
                    // mysqli_close($connection);
                    ?>
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
