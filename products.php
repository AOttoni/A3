<?php
    require_once("controllers/select.controller.php");
?>
<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main> 
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