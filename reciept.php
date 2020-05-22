<?php
    session_start();
    require_once("controllers/reciept.controller.php");
    require_once("controllers/select.controller.php");
?>
<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>                                                   
                    </tr>
                </thead>      
                <?php 
                $total = 0;
                foreach($carts as $cart){ ?>
                <tr>
                    <?php foreach($products as $product){ 
                        if($product['id'] == $cart['product_id']){?>
                            <td><?= $product['name']?></td>
                            <td><?= $cart['quantity']?></td>
                            <td><?= $product['price']?></td>  
                            <td><?= ($product['price'] * $cart['quantity'])?></td>
                            <?= $total += $product['price'] * $cart['quantity'];?>
                            <?php }
                        }
                    }?>                                                                                                                  
                </tr>                    
            </table>
            <h3>Total: <?= $total?></h3>  
            <h3>Shipping Address: <?= $_GET['address']?></h3>
            </table>
            <script type="text/javascript" src="main.js"></script>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>