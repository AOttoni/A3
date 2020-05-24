<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <script type="text/javascript" src="main.js"></script>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main>
        <h1>Registration</h1> 
            <form action="controllers/update_accounts.php" method="get">
                <?php if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
                    <p style = "color: red;">Invalid Credentials</p>
                <?php } ?>
                <?php if(isset($_GET['success']) && $_GET['success'] == 1){?>
                    <p style="color: green;"> Registration Successful</p>
                <?php }?>
                <input type="text" name="fname" placeholder="First Name">
                <input type="text" name="lname"placeholder="Last Name">
                <input type="email" name="email" placeholder="Your E-mail">
                <input type="text" name="password" placeholder="Password">
                <input type="text" name="conf-password"placeholder="Confirm Password">
                <input type="submit">
            </form>            
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>