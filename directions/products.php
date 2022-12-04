<!-- <?php require_once('../db/dbconnection.php'); ?> -->
<?php

  // $errors = array();
  // $product_id = '';
  // $product_name = '';
  // $price = '';
  // $qty = '';
  // $selected = '';
  // $seller_id = '';

  // //save product
  // if (isset($_POST['submit'])) {

  //   $product_id = $_POST['product_id'];
  //   $product_name = $_POST['product_name'];
  //   $price = $_POST['price'];
  //   $convert_price = floatval($price);
  //   $qty = $_POST['qty'];
  //   $seller_id  = $_POST['seller_id'];
    
  //   if(!empty($_POST['category'])) {
  //     $selected = $_POST['category'];
  //   } else {
  //     echo 'Please select the value.';
  //   }

  //   if (empty($errors)) {
  //     $query = "INSERT INTO products VALUES('{$product_id}','{$product_name}','{$convert_price}','{$qty}','{$selected}','{$seller_id}')";
    
  //     $result = mysqli_query($connection, $query);

  //     if ($result) {
  //       echo '<script>alert("Product Added Succusfully!!!!")</script>';
  //     }else{
  //       $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
  //       echo $msg;
  //     }
  //   }

  // }

  // //update product
  // if (isset($_POST['edit'])) {
  //   $product_id = $_POST['product_id'];
  //   $product_name = $_POST['product_name'];
  //   $price = $_POST['price'];
  //   $convert_price = floatval($price);
  //   $qty = $_POST['qty'];
  //   $seller_id = $_POST['seller_id'];

  //   if(!empty($_POST['category'])) {
  //     $selected = $_POST['category'];
  //   } else {
  //     echo 'Please select the value.';
  //   }

  //   if (empty($errors)) {
  //     $query = "UPDATE products SET name='{$product_name}', price='{$convert_price}', number='{$qty}', category='{$selected}', seller_id='{$seller_id}' WHERE products_id='{$product_id}'";
    
  //     $result = mysqli_query($connection, $query);

  //     if ($result) {
  //       echo '<script>alert("Produts update Succusfully!!!!")</script>';
  //     }else{
  //       $errors[] = 'Failed to edit record to table';
  //     }
  //   }

  // }

  // //delete product
  // if (isset($_POST['delete'])) {
  //   $product_id = $_POST['product_id'];

  //   if (empty($errors)) {
  //     $query="DELETE FROM products WHERE products_id='{$product_id}'";
  //     $exec= mysqli_query($connection,$query);
  //     if($exec){
  //       echo '<script>alert("Produts delete Succusfully!!!!")</script>';
  //     }else{
  //       $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
  //       echo $msg;
  //     }
  //   }

  // }


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="icon" type="image/png" href="../images/faveicon.png"/>
  <title>Administration</title>
</head>

<body>
  <div class="mainContainer">
    <div class="navBar">
      <div class="logo">
        <h3><a href="#">Art Ceylon</a></h3>
      </div>
      <div class="navigations">
        <a href="../directions/admin.php">Seller</a>
        <a href="../directions/update.php">Manage Products</a>
      </div>
      <div class="signUpDiv">
        <a class="logIn" href="../directions/login.php">Log Out</a>
      </div>
    </div>
    <div class="titleText">
      <div class="mainText">
        <h3>Products Detail Page</h3>
      </div>
      <div>
        <h4>
          To Delete a Product just Insert the Product id and click delete.
        </h4>
      </div>
    </div>

    <form action="update.php" method="post">
      <div class="adminSection">
        <input type="text" placeholder="Product Id" name="product_id"/><br />
        <input type="text" placeholder="Product Name" name="product_name"/><br />
        <input type="text" placeholder="Price" name="price"/><br />
        <input type="text" placeholder="Quantity" name="qty"/><br />
        <select name="category" id="category">
          <option value="" selected><----Select Product----></option>
          <option value="clay">clay</option>
          <option value="wood">wood</option>
          <option value="ceramic">ceramic</option>
        </select>
        <input type="text" placeholder="seller_id" name="seller_id"/><br />
        <div>
          <button id="addBtn" class="btn" type="submit" name="submit">Add</button>
          <button id="updateBtn" class="btn" type="submit" name="edit">Update</button>
          <button id="deleteBtn" class="btn" type="submit" name="delete">Delete</button>
        </div>
      </div>
    </form>
    

    <footer>
      <div class="footerDivs">
        <p>&copy;2020 artCeylon, Inc</p>
        <a href="#">Terms & Conditions</a>
      </div>
      <div class="footerDivs">
        <h5 class="contact"><a href="#">Contact Us</a></h5>
        <p>+94777334477</p>
        <p>ceylon@info.com</p>
      </div>
      <div class="footerDivs">
        <h3>Art Ceylon</h3>
      </div>
      <div class="footerDivs"></div>
    </footer>
  </div>
</body>

</html>

<!-- <?php mysqli_close($connection); ?> -->