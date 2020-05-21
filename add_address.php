<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main>
            <form action="controllers/add_address.controller.php" get="get">
                <input type="text" name="country" placeholder="Country">
                <input type="text" name="city" placeholder="City">
                <input type="text" name="address" placeholder="Address">
                <input type="submit">
            </form> 
            <script type="text/javascript" src="main.js"></script>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>