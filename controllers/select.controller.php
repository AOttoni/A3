<?php
require_once('database.controller.php');


//Alphabetical
if(isset($_GET['A-Z']))
{
    $statement = $connection->prepare("SELECT `id`, `name`, `price` FROM `product` ORDER BY `name` ASC");
}

//Increasing Price
else if(isset($_GET['Price(Low-High)']))
{
    $statement = $connection->prepare("SELECT `id`, `name`, `price` FROM `product` ORDER BY `price` ASC");    
}

//Increasing Stock
else if(isset($_GET['Stock(Low-High)']))
{
    $statement = $connection->prepare("SELECT `id`, `name`, `price` FROM `product` ORDER BY `stock` ASC");    
}

//Reverse Alphabetical
else if(isset($_GET['Z-A']))
{
    $statement = $connection->prepare("SELECT `id`, `name`, `price` FROM `product` ORDER BY `name` DESC");
}

//Decreasing Price
else if(isset($_GET['Price(High-Low)']))
{
    $statement = $connection->prepare("SELECT `id`, `name`, `price` FROM `product` ORDER BY `price` DESC");    
}

//Decreasing Stock
else if(isset($_GET['Stock(High-Low)']))
{
    $statement = $connection->prepare("SELECT `id`, `name`, `price` FROM `product` ORDER BY `stock` DESC");    
}

//Unset/Default
else
{
    $statement = $connection->prepare("SELECT `id`, `name`, `price` FROM `product`");
}


    $statement->execute();
    $statement->bind_result($id, $name, $price);
    $products = [];
    for ($i = 0; $statement->fetch(); $i++) {
        $products[$i] = ['id' => $id, 'name' => $name, 'price' => $price];
    }
    $statement->close();   
      