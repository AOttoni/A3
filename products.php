<?php
    session_start();
    require_once("controllers/select.controller.php");

    function getImg($productID){        
        $path = "";
        switch($productID){
            case 1: $path = "photos/product-images/shotgun.png";
            break;
            case 2: $path = "photos/product-images/hand_sanitizer.png";
            break;
            case 3: $path = "photos/product-images/apple.png";
            break;
            case 4: $path = "photos/product-images/heineken.png";
            break;
            case 5: $path = "photos/product-images/cats2019.png";
            break;
            case 6: $path = "photos/product-images/TheOffice.jpg";
            break;
            case 7: $path = "photos/product-images/snyder_cut.png";
            break;
            case 8: $path = "photos/product-images/facemask.png";
            break;
            case 9: $path = "photos/product-images/supremeMask.png";
            break;
            case 10: $path = "photos/product-images/lysolSyringes.png";
            break;
        }
        return $path;
    }
    


?>
<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main>
            <h1>Shop</h1>
            <h2 class="subtitle">Order By</h2>
            <div class="sort">                
                <div class="SortOptionsA" >
                    <form action="products.php" method="get">                
                    <input type="submit" name="A-Z" value="A-Z"></form>

                    <form action="products.php" method="get">  
                    <input type="submit" name="Price(Low-High)" value="Price (Low-High)"></form>

                    <form action="products.php" method="get">  
                    <input type="submit" name="Stock(Low-High)" value="Stock (Low-High)"></form>                                    
                </div>
                <div class="SortOptionsB" >
                    <form action="products.php" method="get">                
                    <input type="submit" name="Z-A" value="Z-A"></form>

                    <form action="products.php" method="get">  
                    <input type="submit" name="Price(High-Low)" value="Price (High-Low)"></form>

                    <form action="products.php" method="get">  
                    <input type="submit" name="Stock(High-Low)" value="Stock (High-Low)"></form>                                    
                </div>
            </div>
            <div class="productList">
                <?php foreach($products as $product){ ?>
                    
                    <div class="product-cell">                   
                        <h2>
                            <a href="product.php?id=<?= $product['id']?>"><?= $product['name']?></a>
                            <input type="hidden" name=<?= $product['id']?>>
                        </h2>
                        <h3><?= $product['price']?></h3>                    
                        <img class="product-img" src="<?= getImg($product['id'])?>">
                    </div> 
                    
                <?php  } ?> 
            </div> 
            
            <script type="text/javascript" src="main.js"></script>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>