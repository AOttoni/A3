<?php
$host = "mysql";
    $dbUser = "root";
    $dbPassword = "rootpassword";
    $dbName = "quarantine-supply-db";
    $connection = new mysqli($host, $dbUser, $dbPassword, $dbName);

    if($connection->connect_errno){
        exit("Connection failed: " . $connection->connect_error);
    }