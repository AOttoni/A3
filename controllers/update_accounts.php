<?php
    require_once('database.controller.php');
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $id = 4;
    $statement = $connection->prepare("INSERT INTO `customer` 
    (first_name,last_name,email,`password`,registered_on,`level`)
    VALUES (?,?,?,?,CURDATE(),1)");
    $statement->bind_param('ssss', $fname, $lname, $email, $password);
    $statement->execute();
    $statement->close();
    header("Location: ../products.php");