<?php
    session_start();
    require_once("controllers/select.controller.php");
?>
<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main>
            <div id="sort">
                <h2>Order By</h2>
                <div id="SortOptionsA" >
                    <form action="products.php" method="get">                
                    <input type="submit" name="A-Z" value="A-Z"></form>

                    <form action="products.php" method="get">  
                    <input type="submit" name="Price(Low-High)" value="Price (Low-High)"></form>

                    <form action="products.php" method="get">  
                    <input type="submit" name="Stock(Low-High)" value="Stock (Low-High)"></form>                                    
                </div>
                <div id="SortOptionsB" >
                    <form action="products.php" method="get">                
                    <input type="submit" name="Z-A" value="Z-A"></form>

                    <form action="products.php" method="get">  
                    <input type="submit" name="Price(High-Low)" value="Price (High-Low)"></form>

                    <form action="products.php" method="get">  
                    <input type="submit" name="Stock(High-Low)" value="Stock (High-Low)"></form>                                    
                </div>
            </div> 
            <?php foreach($products as $product){ ?>
                <h2>
                    <a href="product.php?id=<?= $product['id']?>"><?= $product['name']?></a>
                    <input type="hidden" name=<?= $product['id']?>>
                </h2>
                <h3><?= $product['price']?></h3>
                <p>-------------------------------------------</p>
            <?php  } ?> 
            <script type="text/javascript" src="main.js"></script>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>