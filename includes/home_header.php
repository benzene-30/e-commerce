<style>
    .user-logo {
        width: 60px;
        height: 60px;
        border-radius: 50px;
        transition: 0.1s ease-in-out;
    }


    .nav-bar ul a:hover {
        border-bottom: 3px solid white;

    }

    .user-logo:hover {
        background-color: rgba(47, 46, 46, 0.996);
    }

    /* styles for the dropdown */
    .user-menu {
        position: relative;
        display: inline-block;
    }

    .user-menu .dropdown {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 5px;
    }

    .user-menu .dropdown li {
        padding: 12px 16px;
        list-style: none;
        border-bottom: 1px solid #ddd;
    }

    .user-menu .dropdown li:last-child {
        border-bottom: none;
        /* Removes border from last item */
    }

    .user-menu .dropdown li a {
        color: black;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .user-menu .dropdown li a:hover {
        background-color: gray;
    }

    .user-menu:hover .dropdown {
        display: block;
    }

    @media screen and (max-width:500px) {


        .user-logo {
            width: 20px;
            height: 20px;
        }

    }
</style>

<header>
    <nav class="nav-bar">
        <ul>
            <li><a href="#"><img src="../../assets/images/logo.png" alt="logo" class='logo'></a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Reduction</a></li>
            <li>
                <?php
                $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                ?>

                <div class="cart">
                    <a href="cart.php">
                        <img src="../assets/images/cart.png" alt="Cart image" class='cart'>
                        <span class="cart-count"><?php echo $cart_count; ?></span>
                    </a>
                </div>
            <li class="user-menu">
                <a href="#"><img src="../../assets/images/user.png" alt="user logo" class="user-logo"></a>
                <ul class="dropdown">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>