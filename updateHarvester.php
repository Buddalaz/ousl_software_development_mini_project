<?php
// Include config file
require_once "./db/config.php";
 
// Define variables and initialize with empty values
$harvesterEa = "";
$lotId = "";
$lotCoordinates = "";
$variety = "";
$lotAtribute = "";
$yield = "";
$harvesterDate = "";
$chemicalAppli = "";
$dateSold = "";
$manufactuerEa = "";
$comFarmerId = "";
$name_err = $address_err = $salary_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $harvesterEa = $_POST['harvesterEa'];
    $lotId = $_POST['lotId'];
    $lotCoordinates = $_POST['lotCoordinates'];
    $variety = $_POST['variety'];
    $lotAtribute = $_POST['lotAtribute'];
    $yield = $_POST['yield'];
    $harvesterDate = $_POST['harvesterDate'];
    $chemicalAppli = $_POST['chemicalAppli'];
    $dateSold = $_POST['dateSold'];
    $manufactuerEa = $_POST['manufactuerEa'];
    $comFarmerId = $_POST['comFarmerId'];
    
    // Check input errors before inserting in database
        // Prepare an update statement
        $sql = "UPDATE harvester SET harvester_ea=?, lot_id=?, lot_coordinates=?, variety=?, lot_attribute=?, yield=?, harvester_date=?, chemical_application=?, date_sold=?, manufactuer_ea=?, company_famer_id=? WHERE field_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssi", $param_harvestEa, $param_lotid, $param_lotCoordi, $param_variety, $param_lotAttribu, $param_yield, $param_harvesDate, $param_chemiApp, $param_dateSold, $param_manufaEa, $param_comFarId, $id);
            
            // Set parameters
            $param_harvestEa = $harvesterEa;
            $param_lotid = $lotId;
            $param_lotCoordi = $lotCoordinates;
            $param_variety = $variety;
            $param_lotAttribu = $lotAtribute;
            $param_yield = $yield;
            $param_harvesDate = $harvesterDate;
            $param_chemiApp = $chemicalAppli;
            $param_dateSold = $dateSold;
            $param_manufaEa = $manufactuerEa;
            $param_comFarId = $comFarmerId;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: harvesterHome.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM harvester WHERE field_id = ?";
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
                    $harvesterEa = $row["harvester_ea"];
                    $lotId = $row["lot_id"];
                    $lotCoordinates = $row["lot_coordinates"];
                    $variety = $row["variety"];
                    $lotAtribute = $row["lot_attribute"];
                    $yield = $row["yield"];
                    $harvesterDate = $row["harvester_date"];
                    $chemicalAppli = $row["chemical_application"];
                    $dateSold = $row["date_sold"];
                    $manufactuerEa = $row["manufactuer_ea"];
                    $comFarmerId = $row["company_famer_id"];


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
                    <h2 class="mt-5">Update Harvester Record</h2>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Harvester Ea</label>
                            <input type="text" name="harvesterEa" class="form-control" value="<?php echo $harvesterEa; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Lot ID</label>
                            <input type="text" name="lotId" class="form-control" value="<?php echo $lotId; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Plant Coordinates</label>
                            <input type="text" name="lotCoordinates" class="form-control" value="<?php echo $lotCoordinates; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Veriety</label>
                            <input type="text" name="variety" class="form-control" value="<?php echo $variety; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Lot Attribute</label>
                            <input type="text" name="lotAtribute" class="form-control" value="<?php echo $lotAtribute; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Yield</label>
                            <input type="text" name="yield" class="form-control" value="<?php echo $yield; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Harvester Date</label>
                            <input type="date" name="harvesterDate" class="form-control" value="<?php echo $harvesterDate; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Chemical Application</label>
                            <input type="text" name="chemicalAppli" class="form-control" value="<?php echo $chemicalAppli; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date Sold</label>
                            <input type="date" name="dateSold" class="form-control" value="<?php echo $dateSold; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Manufactuer Ea</label>
                            <input type="text" name="manufactuerEa" class="form-control" value="<?php echo $manufactuerEa; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Comapny Ea</label>
                            <input type="text" name="comFarmerId" class="form-control" value="<?php echo $comFarmerId; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="harvesterHome.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>