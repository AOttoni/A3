<?php
require_once('database.controller.php');
$id = $_GET['id'];
$statement = $connection->prepare("SELECT `id`, `name`, `price`, `description` FROM `product` WHERE `id` = ?");
$statement->bind_param('i', $id);   
$statement->execute();
$statement->bind_result($id, $name, $price, $description);
$products = [];
for ($i = 0; $statement->fetch(); $i++) {
    $products[$i] = ['id' => $id, 'name' => $name, 'price' => $price, 'description' => $description];
}
$statement->close();