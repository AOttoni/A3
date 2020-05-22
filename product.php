<?php
    session_start();
    require_once("controllers/product.controller.php");
?>
<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body>
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main>
            <h1><?= $products[0]['name']?></h1>
            <div class="product">
                <div class="product-info">
                    <h2><?= $products[0]['price']?></h2>
                    <?php require_once("includes/find-product-img.php")?>
                    <h3><?= $products[0]['description']?></h3>
                </div>
                <img class="product-img" src="<?= $path?>">
            </div>
            <?php if(isset($_SESSION['id'])){?>
            <button>
                <a href="controllers/add-to-cart.controller.php?id=<?= $products[0]['id']?>">Add To Cart</a>
            </button>
            <?php } ?>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>