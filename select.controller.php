<?php
require_once('database.controller.php');
$statement = $connection->prepare("SELECT `id`, `name`, `price` FROM `product`");
    $statement->execute();
    $statement->bind_result($id, $name, $price);
    $products = [];
    for ($i = 0; $statement->fetch(); $i++) {
        $products[$i] = ['id' => $id, 'name' => $name, 'price' => $price];
    }
    $statement->close();