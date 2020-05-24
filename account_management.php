<?php
session_start();
if (isset($_SESSION['name']) && isset($_SESSION['id'])) {
    require_once("account_info.php");    
}
else{

?>

<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main> 
            <h1>Already Have An Account?</h1>
            <button class="accountBtn"><a href="login.php">Login</a></button>
            <h1>New to Survival?</h1>
            <button class="accountBtn"><a href="registration.php">Sign Up</a></button>
            <h1>How Do We Take Your Money?</h1>
            <button class="accountBtn"><a href="add_method.php">Add a Payment Method</a></button>
            <h1>Where Do You And Your Family Live?</h1>
            <button class="accountBtn"><a href="add_address.php">Add an Address</a></button>
            <script type="text/javascript" src="main.js"></script>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>

<?php
}


?>