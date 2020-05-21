<?php
session_start();
if (isset($_SESSION['name'])) {
    require_once("controllers/cart.controller.php");
    require_once("controllers/select.controller.php");
    require_once("controllers/get_payment_methods.controller.php");
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
                            <td>
                                <button>
                                    <a href="controllers/remove-from-cart.controller.php?id=<?= $product['id']?>">
                                    Remove Item(s)
                                    </a>
                                </button>
                            </td>
                            <?php }
                        }
                    }?>                                                                                                                  
                </tr>                    
            </table>
            <h3>Total: <?= $total?></h3>
            <button><a href="reciept.php?total=<?= $total?>">Check Out</a></button>
            <select name="card_number">
                <?php foreach($number as $card_numbers) {?>
                    <option value=""><?= $number?></option>
                <?php }?>
            </select>
            <? }
            else { ?>
            <p>You're not logged in! You need to <a href="login.php">login</a></p>
            <?php } ?>
            <button><a href="products.php">Continue Shopping</a></button>    
        </main>
        <footer>
            <p>penis</p>
        </footer>
    </body>
</html>