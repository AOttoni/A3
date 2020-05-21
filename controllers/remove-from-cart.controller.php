<?php
    session_start();
    require_once('database.controller.php');
    require_once("product.controller.php");
    $statement = $connection->prepare("DELETE FROM `cart` 
    WHERE customer_id = ? AND `product_id` = ?");
    $statement->bind_param('ii', $_SESSION['id'], $products[0]['id']);
    $statement->execute();
    $statement->close();
    header("Location: ../cart.php");