<?php

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
  if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $proName = $_POST['pro_name'];
    $retName = $_POST['ret_name'];
    $retAddress = $_POST['ret_address'];
    $conNum = $_POST['con_num'];
    $purDate = $_POST['pur_date'];
    $expDate = $_POST['exp_date'];
    $quentity = $_POST['quentity'];
    $retEa = $_POST['reta_ea'];

        // Prepare an update statement
        $sql = "UPDATE retailer SET product_name=?, retailer_name=?, retailer_address=?, contact_number=?, purchese_date=?, expiry_date=?, quentity=?, retailer_ea=? WHERE retailer_id =?";
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssi", $param_proName, $param_retname, $param_retAddress, $param_conNum, $param_purDate, $param_expDate, $param_quent, $param_retEa, $id);
          
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
                // Records updated successfully. Redirect to landing page
                header("location: retailer.php");
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
        $sql = "SELECT * FROM retailer WHERE retailer_id = ?";
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

                    $proName = $row["product_name"];
                    $retName = $row["retailer_name"];
                    $retAddress = $row["retailer_address"];
                    $conNum = $row["contact_number"];
                    $purDate = $row["purchese_date"];
                    $expDate = $row["expiry_date"];
                    $quentity = $row["quentity"];
                    $retEa = $row["retailer_ea"];

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
            <label>Product Name</label><br />
            <input type="text" name="pro_name" value="<?php echo $proName; ?>"/><br />
          </div>
          <div>
            <label>Retailer Name</label><br />
            <input type="text" name="ret_name" value="<?php echo $retName; ?>"/><br />
          </div>
          <div>
            <label>Retailer Address</label><br />
            <input type="text" name="ret_address" value="<?php echo $retAddress; ?>"/><br />
          </div>
          <div>
            <label>Contact Number</label><br />
            <input type="text" name="con_num" value="<?php echo $conNum; ?>"/><br />
          </div>
          <div>
            <label>Purchese Date</label><br />
            <input type="date" name="pur_date" value="<?php echo $purDate; ?>"/><br />
          </div>
          <div>
            <label>Expiry Date</label><br />
            <input type="date" name="exp_date" value="<?php echo $expDate; ?>"/><br />
          </div>
          <div>
            <label>Quentity</label><br />
            <input type="text" name="quentity" value="<?php echo $quentity; ?>"/><br />
          </div>
          <div>
            <label>Retailer Ea</label><br />
            <input type="text" name="reta_ea" value="<?php echo $retEa; ?>"/><br />
          </div>
          <div>
            <button id="addBtn" class="btn" type="submit" name="submit">Update</button>
            <a href="retailer.php" class="btn">Cancel</a>
          </div>
      </form>
    </div>
  </div>
</body>
</html>
