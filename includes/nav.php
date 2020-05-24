<nav>
    <a href="index.php"><img class="img1" src="includes/icons/info_Icon.svg" onmouseover="updateH(0)" onmouseout="revertH()"></img></a>
    <a href="products.php"><img class="img2" src="includes/icons/bag_Icon.svg" onmouseover="updateH(1)" onmouseout="revertH()"></img></a>
    <a href="account_management.php"><img class="img3" src="includes/icons/account_Icon.svg" onmouseover="updateH(2)" onmouseout="revertH()"></img></a>
    <a href="cart.php"><img class="img4" src="includes/icons/cart_Icon.svg" onmouseover="updateH(3)" onmouseout="revertH()"></img></a>    
</nav>

<?php 
if(isset($_SESSION['id']) && isset($_SESSION['name'])) {?>
    <button class="logoutBtn">
    <a href="includes/logout.php">
    Logout
    </a>
    </button>
    <?php }

    else {?>
    <button class="logoutBtn">
    <a href="../login.php">
    Log In
    </a>
    </button>
    <?php }?>
    