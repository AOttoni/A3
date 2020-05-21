<?php
    session_start();
    require_once('database.controller.php');
    require_once("product.controller.php");
    require_once('cart.controller.php');
    
    $product = $products[0]['id'];
    $customer_id = $_SESSION['id'];
    $statement = $connection->prepare("SELECT `product_id` FROM cart WHERE customer_id = ? AND `product_id` = ?");
    $statement->bind_param('ii', $_SESSION['id'], $products[0]['id']);
    $statement->execute();
    $statement->store_result();
    
    $statement = $connection->prepare("DELETE FROM `cart` 
    WHERE customer_id = ? AND `product_id` = ?");
    $statement->bind_param('ii', $_SESSION['id'], $products[0]['id']);
    $statement->execute();
    header("Location: ../cart.php");