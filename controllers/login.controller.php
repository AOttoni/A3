<?php
    require_once('database.controller.php');
    if(!isset($_GET['email']) || !isset($_GET['password'])){
        header('Location: ../login.php?error=1');
    }
    $email = $_GET['email'];
    $password = $_GET['password'];
    $statement = $connection->prepare("SELECT `id`, `first_name` FROM `customer` WHERE `email` = ? AND `password` = ?");
    $statement->bind_param('ss', $email, $password);
    $statement->execute();
    $statement->store_result(); // This needs to be run before accessing num_rows.
    if ($statement->num_rows == 0) {
        $statement->close();
        header('Location: ../login.php?error=1');
    }
    $statement->bind_result($id, $name);
    $statement->fetch();
    $statement->close();
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    header("Location: ../products.php");