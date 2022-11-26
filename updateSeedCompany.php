<?php
// Include config file
require_once "./db/config.php";
 
// Define variables and initialize with empty values
$companyName = "";
$lotCoordinates = "";
$plantBrand = "";
$certifiyingAgency = "";
$variety = "";
$name_err = $address_err = $salary_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $companyName = $_POST['companyName'];
    $lotCoordinates = $_POST['lotCoordinates'];
    $plantBrand = $_POST['plantBrand'];
    $certifiyingAgency = $_POST['certifiyingAgency'];
    $variety = $_POST['variety'];
    
    
    // Prepare an update statement
    $sql = "UPDATE seed_company SET company_name=?, lot_coordinates=?, plant_brand=?, certifiying_agency=?, variety=? WHERE company_famer_id=?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssi", $param_comname, $param_lotCoor, $param_plantBrand, $param_cerAge, $param_variety, $id);
        
        // Set parameters
        $param_comname = $companyName;
        $param_lotCoor = $lotCoordinates;
        $param_plantBrand = $plantBrand;
        $param_cerAge = $certifiyingAgency;
        $param_variety = $variety;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records updated successfully. Redirect to landing page
            header("location: welcome.php");
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
        $sql = "SELECT * FROM seed_company WHERE company_famer_id = ?";
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
                    $companyName = $row["company_name"];
                    $lotCoordinates = $row["lot_coordinates"];
                    $plantBrand = $row["plant_brand"];
                    $certifiyingAgency = $row["certifiying_agency"];
                    $variety = $row["variety"];
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
                    <h2 class="mt-5">Update Seed Company Record</h2>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="companyName" class="form-control" value="<?php echo $companyName; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">name
                            <label>Lot Coordinates</label>
                            <input type="text" name="lotCoordinates" class="form-control" value="<?php echo $lotCoordinates; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Plant Brand</label>
                            <input type="text" name="plantBrand" class="form-control" value="<?php echo $plantBrand; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Certifiying Agency</label>
                            <input type="text" name="certifiyingAgency" class="form-control" value="<?php echo $certifiyingAgency; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Veriety</label>
                            <input type="text" name="variety" class="form-control" value="<?php echo $variety; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="welcome.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>