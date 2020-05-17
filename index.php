<?php
    /*require_once("controllers/select.controller.php");*/
?>
<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main> 
            <?php foreach($products as $product){ ?>
                <form action="product-page.php" method="get">
                    <h2>
                        <a href="product-page.php"><?= $product['name']?></a>
                        <input type="hidden" name=<?= $product['id']?>>
                    </h2>
                </form>
                <h3><?= $product['price']?></h3>
                <p>-------------------------------------------</p>
            <?php  } ?> 
            <script type="text/javascript" scr="main.js"></script>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>