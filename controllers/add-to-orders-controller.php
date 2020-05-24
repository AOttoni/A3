<?php
    session_start();
    require_once('database.controller.php');
    require_once("cart.controller.php");

    $today = date("Y-m-d");
    $paymentMethod = null;
    $billA = null;
    $shipA = null;
    $total = null;

    $product = $products[0]['id'];
    $customer_id = $_SESSION['id'];
    $statement = $connection->prepare("SELECT `product_id` FROM cart WHERE customer_id = ? AND `product_id` = ?");
    $statement->bind_param('ii', $_SESSION['id'], $products[0]['id']);
    $statement->execute();
    $statement->store_result();
    
    
    

    $statement = $connection->prepare("INSERT INTO `order` (order_id, customer_id, made_on, grand_total, ship_to, bill_to, payment_method_used) VALUES (?, ?, $today, $total, $shipA, $shipB)");
    $statement->bind_param('ii', $_SESSION['id'], $products[0]['id']);
    $statement->execute();
    $statement->close();



    for($cart in $carts);
    $statement = $connection->prepare("INSERT INTO `order_product` (product_id, order_id, order_item_quantity, order_item_total) VALUES ( ?, ?, $qty, $itemTotal)");
    $statement->bind_param('ii', $_SESSION['id'], $products[0]['id']);
    $statement->execute();
    $statement->close();



    header("Location: ../cart.php");
