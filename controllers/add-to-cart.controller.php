<?php
    session_start();
    require_once('database.controller.php');
    require_once("product.controller.php");
    $product = $products[0]['id'];
    $customer_id = $_SESSION['id'];
    $statement = $connection->prepare("SELECT `product_id` FROM cart WHERE customer_id = ? AND `product_id` = ?");
    $statement->bind_param('ii', $_SESSION['id'], $products[0]['id']);
    $statement->execute();
    $statement->store_result();
    if($statement->num_rows > 0){
        $statement = $connection->prepare("UPDATE `cart` SET `quantity` = `qunatity` + 1 
        WHERE customer_id = ? AND `product_id` = ?");
        $statement->bind_param('ii', $_SESSION['id'], $products[0]['id']);
        $statement->execute();
    }
    else{
        $statement = $connection->prepare("INSERT INTO `cart` 
        (customer_id, product_id, quantity)
        VALUES (?,?,1)");
        $statement->bind_param('ii', $_SESSION['id'], $products[0]['id']);
        $statement->execute();
        $statement->close();
        header("Location: ../products.php");
    }