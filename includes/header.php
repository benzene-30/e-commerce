<header>
    <nav class="nav-bar">
        <ul>
            <li><a href="#"><img src="./assets/images/logo.png" alt="logo" class='logo'></a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Reduction</a></li>
            <li>
                <?php
                $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                ?>

                <div class="cart-header">
                    <a href="../products/cart.php">
                        <img src="./assets/images/cart.png" alt="Cart image" class='cart'>
                        <span class="cart-count"><?php echo $cart_count; ?></span>
                    </a>
                </div>
            </li>
            <li class="buttons">
                <a href="http://localhost/e-commerce/admin/users/login.php" target='_blank'><button class="btn">Login</button></a>
                <a href="http://localhost/e-commerce/admin/users/create.php" target='_blank'><button class="btn mg-b">Sign Up</button></a>
            </li>
        </ul>
    </nav>
</header>
