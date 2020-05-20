<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main> 
            <form action="controllers/update_accounts.php" method="get">
                <?php if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
                    <p style = "color: red;">Invalid Credentials</p>
                <?php } ?>
                <input type="email" name="email" placeholder="Your E-mail">
                <input type="text" name="password" placeholder="Password">
                <input type="submit">
            </form>
            <script type="text/javascript" src="main.js"></script>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>