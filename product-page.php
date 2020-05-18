<?php require_once("controllers/product.controller.php")?>
<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body>
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main>
            <h1><?= $products[0]['name']?></h1>
            <h2><?= $products[0]['price']?></h2>
            <?php require_once("includes/find-product-img.php")?>
            <img src="<?= $path?>">
            <h3><?= $products[0]['description']?></h3>
            <button>Add To Cart</button>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>