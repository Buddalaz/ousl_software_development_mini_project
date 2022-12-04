<?php

  require_once('../db/dbconnection.php');

  $errors = array();

  $com_supp_id = '';
  $com_name = '';
  $lot_coordinates = '';
  $ingre_type = '';
  $cer_age = '';
  $varity = '';

  // Processing form data when form is submitted
  if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    $com_name = $_POST['company_name'];
    $lot_coordinates = $_POST['lot_coordinates'];
    $ingre_type = $_POST['ingredient_type'];
    $cer_age = $_POST['certifiying_agency'];
    $varity = $_POST['variety'];

        // Prepare an update statement
        $sql = "UPDATE company SET company_name=?, lot_coordinates=?, ingredient_type=?, certifiying_agency=?, variety=? WHERE company_supplier_id=?";
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_comname, $param_lotcoor, $param_ingretype, $param_cerage, $param_cerage, $id);
            
            // Set parameters
            $param_comname = $com_name;
            $param_lotcoor = $lot_coordinates;
            $param_ingretype = $ingre_type;
            $param_cerage = $cer_age;
            $param_varity = $varity;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: admin.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($connection);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM company WHERE company_supplier_id = ?";
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value

                    $com_name = $row["company_name"];
                    $lot_coordinates = $row["lot_coordinates"];
                    $ingre_type = $row["ingredient_type"];
                    $cer_age = $row["certifiying_agency"];
                    $varity = $row["variety"];

                } 
                // else{
                //     // URL doesn't contain valid id. Redirect to error page
                //     header("location: error.php");
                //     exit();
                // }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($connection);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
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
    <div class="titleText">
      <div class="mainText">
        <h3>Update Company Detail Page</h3>
      </div>
      <div>
        <h4>All the fields are required.</h4>
      </div>
    </div>

    <div class="adminSection">
      <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
          <input type="hidden" placeholder="Company Supplier Id" name="id" value="<?php echo $id; ?>"/><br />
          <div>
            <label>Company Name</label><br />
            <input type="text" placeholder="Company Name" name="company_name" value="<?php echo $com_name; ?>"/><br />
          </div>
          <div>
            <label>lot Coordinate</label><br />
            <input type="text" placeholder="Lot Coordinates" name="lot_coordinates" value="<?php echo $lot_coordinates; ?>"/><br />
          </div>
          <div>
            <label>ingrediant Types</label><br />
            <input type="text" placeholder="Ingredient Type" name="ingredient_type" value="<?php echo $ingre_type; ?>"/><br />
          </div>
          <div>
            <label>Certifing Agency</label><br />
            <input type="text" placeholder="Certiying Agency" name="certifiying_agency" value="<?php echo $cer_age; ?>"/><br />
          </div>
          <div>
            <label>Variety</label><br />
            <input type="text" placeholder="Variety" name="variety" value="<?php echo $varity; ?>"/><br />
          </div>
          <div>
            <button id="addBtn" class="btn" type="submit" name="submit">Update</button>
            <a href="admin.php" class="btn">Cancel</a>
          </div>
      </form>
    </div>
  </div>
</body>
</html>
