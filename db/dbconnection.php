<?php 

    //db propertys
    $host = 'localhost';
    $username = 'root';
    $pass = 'root';
    $db = 'demo_2';

    $connection = mysqli_connect($host,$username,$pass,$db);

    if(mysqli_connect_errno()){
        die('DataBase connection failed' . mysqli_connect_error());
    }else{
        // echo "connection succussfull!!!";
    }

    // echo "hello world";
?>