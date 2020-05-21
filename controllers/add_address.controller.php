<?php
    session_start();
    require_once('database.controller.php');
    $country = $_GET['country'];
    $city = $_GET['city'];
    $address = $_GET['address'];
    $statement = $connection->prepare("INSERT INTO `address` 
    (`country`, `city`, `address`)
    VALUES (?,?,?)");
    $statement->bind_param('sss', $country, $city, $address);
    $statement->execute();
    $last_id = mysqli_insert_id($connection);
    $statement->close();
    $statement = $connection->prepare("INSERT INTO `customer_address` 
    (`address_id`, `customer_id`)
    VALUES (?,?)");
    $statement->bind_param('ii', $last_id, $_SESSION['id']);
    $statement->execute();
    $statement->close();
    header("Location: ../account_management.php");