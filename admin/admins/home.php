<?php
session_start();

if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/logo.png" type="image/x-icon">

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

    <!-- Core Styles -->
    <link rel="stylesheet" href="../../assets/css/styles.css">

    <!-- Component Styles -->
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <!-- <link rel="stylesheet" href="../assets/css/home.css"> -->

    <title>UK STORE</title>
</head>

<body>
    <header>
        <nav class="nav-bar">
            <ul>
                <li><a href="#"><img src="../../assets/images/logo.png" alt="logo" class='logo'></a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Reduction</a></li>
                <li class="user-menu">
                    <a href="#"><img src="../../assets/images/user.png" alt="user logo" class="user-logo"></a>
                    <ul class="dropdown">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Messages</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="admin_logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <!-- HERO SECTION -->
    <div>
        <img src="../images/admin-back.jpg" alt="Hero Image" class='hero-img'>
    </div>

    <!-- CONTENT SECTION -->
    <section class='content-info'>
        <h6 class="title">Welcome <?php echo htmlspecialchars($_SESSION['name']) ?>!</h6>
        <h1 class='title'>UK.STORE ADMIN</h1>
        <article class='container'>
            <div class="card mx my">
                <img src="../images/add_product.png" alt="pic"></img>
                <h3>Add a new Product</h3>
                <a href="../products/add_product.php"> <button class='btn-info'>View</button></a>
            </div>

            <div class="card mx my">
                <img src="../images/view-update-product.png" alt="pic"></img>
                <h3>View / Update Products</h3>
                <a href="../products/view_product.php"> <button class='btn-info'>View</button></a>
            </div>

            <div class="card mx my">
                <img src="../images/delete-product.png" alt="pic"></img>
                <h3>Delete Products</h3>
                <a href="../products/delete_product.php"> <button class='btn-info'>View</button></a>
            </div>

            <div class="card mx my">
                <img src="../images/users.png" alt="pic"></img>
                <h3>View Users</h3>
                <a href="../users/view.php"> <button class='btn-info'>View</button></a>
            </div>

            <div class="card mx my">
                <img src="../images/add_admin.png" alt="pic"></img>
                <h3>Add an Admin</h3>
                <a href="admin_create.php"> <button class='btn-info'>View</button></a>
            </div>

            <div class="card mx my">
                <img src="../images/admins.png" alt="pic"></img>
                <h3>View Admins</h3>
                <a href="admin_view.php"> <button class='btn-info'>View</button></a>
            </div>
        </article>
    </section>

    <footer>
        <div class="social-media">
            <ul>
                <h2>ABOUT UK.STORE</h2>
                <div class="about-us-info">
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Marketplace</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Brands available</a></li>
                    <li><a href="#">Product categories</a></li>
                    <li><a href="#">Environmental protection</a></li>
                    <li><a href="#">Corporate sales</a></li>
                    <li><a href="#">Tax free</a></li>
                </div>
            </ul>
        </div>
        <div class="social-media">
            <ul>
                <h2>CUSTOMER SUPPORT</h2>
                <div class="customer-support">
                    <li><a href="#">Support articles</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Return products</a></li>
                    <li><a href="#">Complaints</a></li>
                    <li><a href="#">UK.STORE store chain</a></li>
                </div>
            </ul>
        </div>
        <div class="social-media">
            <ul>
                <h2>CONTACT</h2>
                <div class="CONTACT">
                    <li><a href="tel:054/9196">Telephone: 054 / 9196 </a></li>
                    <li><a href="#">Fax: 021 / 312.00.39</a></li>
                    <li><a href="#">Newsletter</a></li>
                    <li><a href="#">Contact form</a></li>
                </div>
            </ul>
        </div>
        <div class="social-media">
            <ul>
                <h2>FOLLOW US</h2>
                <div class="social-media-icon">
                    <li><a href="#"><img src="../../assets/images/facebook.png" alt="Facebook logo" class='social-img' /></a></li>
                    <li><a href="#"><img src="../../assets/images/twitter.png" alt="Twitter logo" class='social-img' /></a></li>
                    <li><a href="#"><img src="../../assets/images/instagram.png" alt="Instagram logo" class='social-img' /></a></li>
                </div>
            </ul>
        </div>
    </footer>
    <p class='copy'>&copy;<?php echo date("Y") ?> UK.STORE</p>
</body>

</html>