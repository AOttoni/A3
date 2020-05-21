<?php
require_once('database.controller.php');
$total = $_GET['total'];
$statement = $connection->prepare(
    "INSERT INTO `order` (`customer_id`, `made_on`, `grand_total`, `ship_to`, `bill_to`, `payment_method_used`)
    VALUES (?,CURDATE(),?,?,?,?)");
    $statement->bind_param('ss', $_SESSION['id'], $total);
    $statement->execute();
    $statement->bind_result($id, $name, $price);
    $order_items = [];
    for ($i = 0; $statement->fetch(); $i++) {
        $products[$i] = ['id' => $id, 'name' => $name, 'price' => $price];
    }
    $statement->close();