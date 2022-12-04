<?php

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
  if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $proId = $_POST['pro_id'];
    $manuDate = $_POST['man_date'];
    $expDate = $_POST['exp_date'];
    $graType = $_POST['gra_type'];
    $dateSold = $_POST['date_sold'];
    $quentity = $_POST['que_sold'];
    $shipCred = $_POST['ship_cre'];
    $disEa = $_POST['dis_ea'];

        // Prepare an update statement
        $sql = "UPDATE distributer SET product_id=?, manufactuer_date=?, expiry_date=?, grain_type=?, date_sold=?, quentity_sold=?, shipment_credentials=?, distributer_ea=? WHERE distributer_id =?";
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssi", $param_proid, $param_manudate, $param_expdate, $param_gratype, $param_datesold, $param_quent, $param_shipcard, $param_disea, $id);
          
          // Set parameters
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
                // Records updated successfully. Redirect to landing page
                header("location: distributer.php");
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
        $sql = "SELECT * FROM distributer WHERE distributer_id = ?";
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

                    $proId = $row["product_id"];
                    $manuDate = $row["manufactuer_date"];
                    $expDate = $row["expiry_date"];
                    $graType = $row["grain_type"];
                    $dateSold = $row["date_sold"];
                    $quentity = $row["quentity_sold"];
                    $shipCred = $row["shipment_credentials"];
                    $disEa = $row["distributer_ea"];

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
        <h3>Update Distributer Detail Page</h3>
      </div>
      <div>
        <h4>All the fields are required.</h4>
      </div>
    </div>

    <div class="adminSection">
      <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
          <input type="hidden" name="id" value="<?php echo $id; ?>"/><br />
          <div>
            <label>Product id</label><br />
            <input type="text" name="pro_id" value="<?php echo $proId; ?>"/><br />
          </div>
          <div>
            <label>Manufacture Date</label><br />
            <input type="date" name="man_date" value="<?php echo $manuDate; ?>"/><br />
          </div>
          <div>
            <label>Expiry Date</label><br />
            <input type="date" name="exp_date" value="<?php echo $expDate; ?>"/><br />
          </div>
          <div>
            <label>Grain type</label><br />
            <input type="text" name="gra_type" value="<?php echo $graType; ?>"/><br />
          </div>
          <div>
            <label>Date Sold</label><br />
            <input type="date" name="date_sold" value="<?php echo $dateSold; ?>"/><br />
          </div>
          <div>
            <label>Quantity Sold</label><br />
            <input type="text" name="que_sold" value="<?php echo $quentity; ?>"/><br />
          </div>
          <div>
            <label>Shipment Credentials</label><br />
            <input type="text" name="ship_cre" value="<?php echo $shipCred; ?>"/><br />
          </div>
          <div>
            <label>Distributer Ea</label><br />
            <input type="text" name="dis_ea" value="<?php echo $disEa; ?>"/><br />
          </div>
          <div>
            <button id="addBtn" class="btn" type="submit" name="submit">Update</button>
            <a href="distributer.php" class="btn">Cancel</a>
          </div>
      </form>
    </div>
  </div>
</body>
</html>
