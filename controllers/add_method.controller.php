<?php
    session_start();
    require_once('database.controller.php');
    $card_type = $_GET['type'];
    $card_num = $_GET['card_number'];
    $statement = $connection->prepare("INSERT INTO `payment_method` 
    (`card_type`, `card_number`)
    VALUES (?,?)");
    $statement->bind_param('si', $card_type, $card_num);
    $statement->execute();
    $last_id = mysqli_insert_id($connection);
    $statement->close();
    $statement = $connection->prepare("INSERT INTO `customer_payment_method` 
    (`method_id`, `customer_id`)
    VALUES (?,?)");
    $statement->bind_param('ii', $last_id, $_SESSION['id']);
    $statement->execute();
    $statement->close();
    header("Location: ../account_management.php");