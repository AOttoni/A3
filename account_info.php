<?php    
    require_once("controllers/select.controller.php");
    require_once("controllers/user.controller.php");
?>
<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main>
        <h1>My Profile</h1>        
        <div class="profileContainer">
            <div class="mainInfo">
                <h1><?php $users[$_SESSION['id']]['first_name'] ?></h1>
                <h2>Level <?php $users[$_SESSION['id']]['level']?> Survivor</h2>
                <h2>Member since <?php $users[$_SESSION['id']]['registered_on']?> </h2>
                <h2>Email: <?php $users[$_SESSION['id']]['email']?></h2>
            </div>
            <button class="historyButton">Go to order hisotry</button>
            <div class="addresses">
                <h3 class="aHeader">Addresses</h3>
                <button class="editAddressBtn">Edit</button>
                <table class="aTable"></table>
            </div>
            <div class="payments">
                <h3 class="pHeader">Payment Methods</h3>
                <button class="editPaymentBtn">Edit</button>
                <table class="eTable"></table>
            </div>
        </div>
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>