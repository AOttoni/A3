<?php
session_start();
if (isset($_SESSION['name'])) {
    require_once("controllers/cart.controller.php");
    //require_once("controllers/product.controller.php");
}
?>
<!DOCTYPE html>
<html>
<?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main>
        <?php if (isset($_SESSION['name'])) {?>        
            <table border="1">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>                                                   
                    </tr>
                </thead>                        
                <?php foreach($carts as $cart){ ?>
                <tr>
                    <?php foreach($products as $product){ 
                        if($product['id'] == $cart['product_id']){?>
                            <td><?= $product['name']?></td>
                            <td><?= $cart['qty']?></td>
                            <td><?= $product['price']?></td>  
                            <td><?= ($product['price'] * $cart['qty'])?></td>
                            <?php }
                        }
                    }?>                                                                                                                  
                </tr>                    
            </table>
            <? }
            else { ?>
            <p>You're not logged in! You need to <a href="login.php">login</a></p>
            <?php } ?>    
            /*Maybe include a Continue Shopping Button*/ 
        </main>
        <footer>
            <p>penis</p>
        </footer>
    </body>
</html>