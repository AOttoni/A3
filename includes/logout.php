<?php
    if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
        unset($_SESSION['name']);
        unset($_SESSION['id']);        
        header('Location: ../account_management.php');        
    }
    else
        header('Location: ../index.php'); 
    
