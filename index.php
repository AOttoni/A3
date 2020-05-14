<?php
    require_once("select.controller.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quarantine Supply</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <img class="banner" src="photos/banner.png">
        </header>
        <nav>
            <button>Products</button>
            <button>About</button>
            <button>Profile</button>
            <button>Cart</button>
            <button><a href="photos/carti.png">Carti</a></button> 
        </nav>
        <main> 
            <?php foreach($products as $product){ ?>
                <h2>
                    <a><?= $product['name']?></a>
                </h2>
                <h3><?= $product['price']?></h3>
                <p>-------------------------------------------</p>
            <?php  } ?> 
        </main>
        <footer>
            <p>penis</p>
        </footer>
    </body>
</html>