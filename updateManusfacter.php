<?php
// Include config file
require_once "./db/config.php";
 
// Define variables and initialize with empty values
$manuEa = "";
$shipDate = "";
$shipCredi = "";
$grainType = "";
$purDate = "";
$variety = "";
$quentity = "";
$dateSold = "";
$manuDate = "";
$proId = "";
$proName = "";
$weight = "";
$manuName = "";
$name_err = $address_err = $salary_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $manuEa = $_POST['manuEa'];
    $shipDate = $_POST['shipDate'];
    $shipCredi = $_POST['shipCredit'];
    $grainType = $_POST['grainType'];
    $purDate = $_POST['purDate'];
    $variety = $_POST['variety'];
    $quentity = $_POST['quentity'];
    $dateSold = $_POST['dateSold'];
    $manuDate = $_POST['manuFaDate'];
    $proId = $_POST['prodId'];
    $proName = $_POST['proName'];
    $weight = $_POST['weight'];
    $manuName = $_POST['manufaName'];
    
    // Check input errors before inserting in database
    // if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Prepare an update statement
        $sql = "UPDATE manufactuer SET manufactuer_ea=?, shipment_date=?, shipment_credentials=?, grain_type=?, purchese_date=?, variety=?, quentity=?, date_sold=?, manufactuer_date=?, product_id=?, product_name=?, weight=?, manufactuer_name=?  WHERE manufactuer_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssissssssi", $param_manuEa, $param_shipDate, $param_shipCredi, $param_gaTy, $param_purDate, $param_veriety, $param_quentity, $param_dateSold, $param_manuDate, $param_proId, $param_proName, $param_weight, $param_manuName, $id);
            
            // Set parameters
            $param_manuEa = $manuEa;
            $param_shipDate = $shipDate;
            $param_shipCredi = $shipCredi;
            $param_gaTy = $grainType;
            $param_purDate = $purDate;
            $param_veriety = $variety;
            $param_quentity = $quentity;
            $param_dateSold = $dateSold;
            $param_manuDate = $manuDate;
            $param_proId = $proId;
            $param_proName = $proName;
            $param_weight = $weight;
            $param_manuName = $manuName;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ManusfacterHome.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    // }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM manufactuer WHERE manufactuer_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
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
                    $manuEa = $row["manufactuer_ea"];
                    $shipDate = $row["shipment_date"];
                    $shipCredi = $row["shipment_credentials"];
                    $grainType = $row["grain_type"];
                    $purDate = $row["purchese_date"];
                    $variety = $row["variety"];
                    $quentity = $row["quentity"];
                    $dateSold = $row["date_sold"];
                    $manuDate = $row["manufactuer_date"];
                    $proId = $row["product_id"];
                    $proName = $row["product_name"];
                    $weight = $row["weight"];
                    $manuName = $row["manufactuer_name"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
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
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Manufactuer Record</h2>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Manusfacter Ea</label>
                            <input type="text" name="manuEa" class="form-control" value="<?php echo $manuEa; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Shipment Date</label>
                            <input type="date" name="shipDate" class="form-control" value="<?php echo $shipDate; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Shipment Credentials</label>
                            <input type="text" name="shipCredit" class="form-control" value="<?php echo $shipCredi; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Grain Type</label>
                            <input type="text" name="grainType" class="form-control" value="<?php echo $grainType; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Purchese Date</label>
                            <input type="date" name="purDate" class="form-control" value="<?php echo $purDate; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Variety</label>
                            <input type="text" name="variety" class="form-control" value="<?php echo $variety; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Quentity</label>
                            <input type="text" name="quentity" class="form-control" value="<?php echo $quentity; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date Sold</label>
                            <input type="date" name="dateSold" class="form-control" value="<?php echo $dateSold; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Manufactuer Date</label>
                            <input type="date" name="manuFaDate" class="form-control" value="<?php echo $manuDate; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product Id</label>
                            <input type="text" name="prodId" class="form-control" value="<?php echo $proId; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="proName" class="form-control" value="<?php echo $proName; ?>">
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Weight</label>
                            <input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Manufactuer Name</label>
                            <input type="text" name="manufaName" class="form-control" value="<?php echo $manuName; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="ManusfacterHome.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>