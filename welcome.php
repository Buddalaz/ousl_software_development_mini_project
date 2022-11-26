<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to index page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

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
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $companyName = $_POST['companyName'];
    $lotCoordinates = $_POST['lotCoordinates'];
    $plantBrand = $_POST['plantBrand'];
    $certifiyingAgency = $_POST['certifiyingAgency'];
    $variety = $_POST['variety'];
    
    // Check input errors before inserting in database
    // if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO seed_company(company_name, lot_coordinates, plant_brand, certifiying_agency, variety) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_comname, $param_lotCoor, $param_plantBrand, $param_cerAge, $param_variety);

            // Set parameters
            $param_comname = $companyName;
            $param_lotCoor = $lotCoordinates;
            $param_plantBrand = $plantBrand;
            $param_cerAge = $certifiyingAgency;
            $param_variety = $variety;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: welcome.php");
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" href="./styles/style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="mainContainer">
        <div class="navBar">
            <div class="logo">
            <h3><a href="#">Trust Coconut</a></h3>
            </div>
            <div class="navigations">
            <a href="#">Seed Company</a>
            <a href="harvesterHome.php">Harvester</a>
            <a href="ManusfacterHome.php">Manusfacter</a>
            </div>
            <div class="signUpDiv">
                <p><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></p>
                <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
            </div>
        </div>
    </div>
    <div class="formUpperContainer">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="formWrap" method="POST">
           <!-- <h1>Welcome to main page</h1> -->
            <div class="row g-3 p-3">
                <div class="col">
                    <input type="text" class="form-text form-control" placeholder="Company Name" aria-label="First name" name="companyName">
                </div>
            </div>
            <div class="row g-3 p-3">
                <div class="col">
                        <input type="text" class="form-control" placeholder="Lot Coordinates" aria-label="Last name" name="lotCoordinates">
                </div>
            </div>
            <div class="row g-3 p-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Plant Brand" aria-label="Last name" name="plantBrand">
                </div>
            </div>
            <div class="row g-3 p-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Certifiying Agency" aria-label="First name" name="certifiyingAgency">
                </div>   
            </div>
            <div class="row g-3 p-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Veriety" aria-label="Last name" name="variety">
                </div>
            </div>
            <div class="btn-group p-4" role="group" aria-label="Basic mixed styles example">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    // Include config file
                    require_once "./db/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM seed_company";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Company Name</th>";
                                        echo "<th>Lot Coordinates</th>";
                                        echo "<th>Plant Brand</th>";
                                        echo "<th>Certifiying Agency</th>";
                                        echo "<th>Variety</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['company_famer_id'] . "</td>";
                                        echo "<td>" . $row['company_name'] . "</td>";
                                        echo "<td>" . $row['lot_coordinates'] . "</td>";
                                        echo "<td>" . $row['plant_brand'] . "</td>";
                                        echo "<td>" . $row['certifiying_agency'] . "</td>";
                                        echo "<td>" . $row['variety'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="updateSeedCompany.php?id='. $row['company_famer_id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="deleteSeedCompany.php?id='. $row['company_famer_id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                    //         // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</body>
</html>