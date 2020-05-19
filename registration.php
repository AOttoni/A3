<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main> 
            <form action="controllers/update_accounts.php" method="get">
                <input type="text" name="fname" placeholder="First Name">
                <input type="text" name="lname"placeholder="Last Name">
                <input type="email" name="email" placeholder="Your E-mail">
                <input type="text" name="password" placeholder="Password">
                <input type="text" placeholder="Confirm Password">
                <input type="submit">
            </form>
            <script type="text/javascript" src="main.js"></script>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>