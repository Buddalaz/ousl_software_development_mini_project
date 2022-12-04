<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once('../db/dbconnection.php');
    
    // Prepare a delete statement
    $sql = "DELETE FROM company WHERE company_supplier_id = ?";
    
    if($stmt = mysqli_prepare($connection, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
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
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
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
        <h3>Delete Company Detail Page</h3>
      </div>
    </div>

    <div class="bisContainer">
      <h2 class="">Delete Record</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div>
              <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
              <p>Are you sure you want to delete this Company record?</p>
              <p>
                <input type="submit" value="Yes" class="btn">
                <div class="btnNo">
                  <a href="admin.php" style="color:white;">No</a>
                </div>
              </p>
          </div>
      </form>
      </div>
  </div>
</body>
</html>
