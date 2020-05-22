<?php
require_once('database.controller.php');
$total = $_GET['total'];
$card_num = $_GET['card_number'];
$address = $_GET['address'];
$statement = $connection->prepare(
    "INSERT INTO `order` (`customer_id`, `made_on`, `grand_total`, `ship_to`, `bill_to`, `payment_method_used`)
    VALUES (?,CURDATE(),?,?,?,?)");
    $statement->bind_param('iiiii', $_SESSION['id'], $total, $address, $address, $card_num);
    $statement->execute();
    $last_id = mysqli_insert_id($connection);

    $statement = $connection->prepare("SELECT `product_id`, `customer_id`, `quantity` FROM `cart` WHERE customer_id = ?");
    $statement->bind_param('i', $_SESSION['id']);
    $statement->execute();
    $statement->bind_result($product_id, $customer_id, $qty);
    $carts = [];
    for ($i = 0; $statement->fetch(); $i++) {
        $carts[$i] = ['product_id' => $product_id, 'customer_id' => $customer_id, 'quantity' => $qty];
    }

    foreach ($carts as $cart){
        $statement = $connection->prepare("SELECT `price` FROM `product` WHERE `id` = ?");
        $statement->bind_param('i', $cart['product_id']);
        $statement->execute();
        $statement->bind_result($price);
        $statement->fetch();
        $total = $price * $cart['quantity'];
        $statement->close();
        $statement = $connection->prepare("UPDATE `product` SET stock = stock - 1 WHERE id = ?");
        $statement->bind_param('i', $cart['product_id']);
        $statement->execute();
        $statement->close();
        $statement = $connection->prepare(
            "INSERT INTO `order_product` (`product_id`, `order_id`, `order_item_quantity`, `order_item_total`)
            VALUES (?,?,?,?)");
            $statement->bind_param('iiii', $cart['product_id'], $last_id, $cart['quantity'], $total);
            $statement->execute();
    }
    $statement->close();