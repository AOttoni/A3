<?php
require_once('database.controller.php');
$id = $_SESSION['id'];
$statement = $connection->prepare("SELECT method_id, customer_id FROM customer_payment_method WHERE customer_id = ?");
$statement->bind_param('i', $id);
$statement->execute();
$statement->bind_result($method_id, $customer_id);
$customer_methods = [];
for ($i = 0; $statement->fetch(); $i++) {
    $customer_methods[$i] = ['method_id' => $method_id, 'customer_id' => $customer_id];
}
$statement->close();
$card_numbers = []; 
$card_number;
for ($i = 0; $i < count($customer_methods); $i++){
    if(empty($customer_methods)){
        break;
    }
    $method_id = $customer_methods[$i]['method_id'];
    $statement = $connection->prepare("SELECT id, card_number FROM payment_method WHERE id = ?");
    $statement->bind_param('i', $method_id);
    $statement->execute();
    $statement->bind_result($id, $card_number);
    $statement->fetch();
    $card_numbers[$i] = ['method_id' => $id, 'card_number' => $card_number];
    $statement->close();
}

