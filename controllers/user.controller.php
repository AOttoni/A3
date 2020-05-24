<?php
require_once('database.controller.php');
$id = $_SESSION['id'];
$statement = $connection->prepare("SELECT `id`, `first_name`, `last_name`, `email`, `registered_on`, `level` FROM `customer` WHERE `id` = ?");
$statement->bind_param('i', $id);   
$statement->execute();
$statement->bind_result($id, $first_name, $last_name, $email, $registered_on, $level);
$users = [];
for ($i = 0; $statement->fetch(); $i++) {
    $users[$i] = ['id' => $id, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'registered_on' => $registered_on, 'level' => $level];
}
$statement->close();