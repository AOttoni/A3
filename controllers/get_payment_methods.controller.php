<?php
require_once('database.controller.php');
$id = $_SESSION['id'];
$statement = $connection->prepare("SELECT * FROM `customer_payment_method` WHERE `customer_id` = ?");
$statement->bind_param('i', $id);   
$statement->execute();
$statement->bind_result($customer_id, $method_id);
$customer_methods = [];
for ($i = 0; $statement->fetch(); $i++) {
    $customer_methods[$i] = ['customer_id' => $customer_id, 'method_id' => $method_id];
}

$statement = $connection->prepare("SELECT `id`, `card_number` FROM `payment_method` WHERE `id` IN ?");
$statement->bind_param('i', $customer_methods['method_id']);  
$statement->bind_result($id, $card_number);
$card_numbers = []; 
for ($i = 0; $statement->fetch(); $i++) {
    $card_numbers[$i] = ['method_id' => $id, 'card_number' => $card_number];
}
$statement->execute();
$statement->close();