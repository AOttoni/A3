<?php
require_once('database.controller.php');
$id = $_SESSION['id'];
$statement = $connection->prepare("SELECT address_id, customer_id FROM customer_address WHERE customer_id = ?");
$statement->bind_param('i', $id);
$statement->execute();
$statement->bind_result($address_id, $customer_id);
$customer_addresses = [];
for ($i = 0; $statement->fetch(); $i++) {
    $customer_addresses[$i] = ['address_id' => $address_id, 'customer_id' => $customer_id];
}
$statement->close();
$addresses = []; 
$address;

for ($i = 0; $i < count($customer_addresses); $i++){
    if(empty($customer_addresses)){
        break;
    }
    $address_id = $customer_addresses[$i]['address_id'];
    $statement = $connection->prepare("SELECT id, address FROM address WHERE id = ?");
    $statement->bind_param('i', $address_id);
    $statement->execute();
    $statement->bind_result($id, $address);
    $statement->fetch();
    $addresses[$i] = ['address_id' => $id, 'address' => $address];
    $statement->close();
}