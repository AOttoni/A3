<?php
    require_once('database.controller.php');
    $statement = $connection->prepare("SELECT `product_id`, `customer_id`, `quantity` FROM `cart` WHERE customer_id = ?");
    $statement->bind_param('i', $_SESSION['id']);
    $statement->execute();
    $statement->bind_result($product_id, $customer_id, $qty);
    $carts = [];
    for ($i = 0; $statement->fetch(); $i++) {
        $carts[$i] = ['product_id' => $product_id, 'customer_id' => $customer_id, 'quantity' => $qty];
    }
    $statement->close();