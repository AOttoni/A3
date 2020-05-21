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
            <form action="controllers/add_method.controller.php" get="get">
                <select name="type">
                    <option value="credit">Credit</option>
                    <option value="debit">Debit</option>
                    <option value="gift card">Gift Card</option>
                </select>
                <input type="text" name="card_number">
                <input type="submit">
            </form> 
            <script type="text/javascript" src="main.js"></script>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>