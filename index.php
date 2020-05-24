<?php
    session_start();
    require_once("controllers/select.controller.php");
?>
<!DOCTYPE html>
<html>
    <?php require_once("includes/head.php")?>
    <body> 
        <?php require_once("includes/header.php")?>
        <?php require_once("includes/nav.php")?>
        <main>
            <h1>About Us</h1>
            <p class="aboutUs">
            The Quarantine Survival Mart is an online store dedicated to selling overpriced “survival equipment” 
            to those who think they need it during this pandemic. We sell all sorts of “essential” survival 
            equipment. Really, anything from hand sanitizer to shotguns. We sell to anyone and everyone who 
            has an internet connection and the will to live and one day tell their children how they survived 
            this pandemic. Our biggest customers are middle-aged men and women, which is why our site will promote 
            accessibility by being legible and easy to navigate through.
            </p> 
            <script type="text/javascript" src="main.js"></script>            
        </main>
        <?php require_once("includes/footer.php")?>
    </body>
</html>