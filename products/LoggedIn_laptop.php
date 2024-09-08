<?php

session_start();

//Checking if the user was logged IN
if (!isset($_SESSION['logged_in']) || isset($_SESSION['logged_in']) !== true) {
    header("Location: ../admin/users/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon">

    <!-- Core Styles -->
    <!-- <link rel="stylesheet" href="../assets/css/styles.css"> -->

    <!-- Component Styles -->
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/home_navbar.css">

    <link rel="stylesheet" href="../assets/css/products.css">

    <title>Laptops</title>
</head>

<body>
    <!-- INCLUDING THE HEADER -->
    <?php
    include "../includes/LoggedIn_product_header.php";
    ?>

    <!-- HERO SECTION -->
    <div>
        <img src="../assets/images/laptop-back.jpg" alt="Hero Image" class="hero-img">
    </div>

    <!-- CONTENT SECTION -->
    <section class='content-info'>
        <h1 class='title'>UK.STORE</h1>
        <h6 class='title'>Laptops</h6>
        <article class='container'>
            <div class="card mx my">
                <img src="../assets/images/laptops/macbookAir.png" alt="pic"></img>
                <h3>Laptop Apple MacBook Air 13-inch, True Tone, Apple M1 processor, 8 CPU cores and 7 GPU cores, 8GB, 256GB, Space Grey, INT KB
                </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
                </button>
            </div>
            <div class="card mx my">
                <img src="../assets/images/laptops/asusVivoBook.png" alt="pic"></img>
                <h3>Laptop ASUS VivoBook 16 A1605ZA with Intel® Core™ i7-1255U processor up to 4.70 GHz, 16", WUXGA, IPS, 16GB, 512GB SSD, Intel Iris Xᵉ Graphics, No OS, Indie Black
                </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/laptops/hpEliteDragonFly.png" alt="pic"></img>
                <h3>Laptop HP Elite Dragonfly G4, 13.5 inch 1920 x 1280, Intel Core i7-1355U 10 C / 12 T, 5.00 GHz, 12 MB cache, 15 W, 32 GB LPDDR5, 1 TB SSD, Intel Iris Xe Graphics, Windows 11 Pro 818N5EAABD
                </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/laptops/macbookPro.png" alt="pic"></img>
                <h3>Apple MacBook Pro 14" laptop with Apple M3 Pro processor, 12 CPU cores and 18 GPU cores, 1TB SSD, Space Black, INT KB
                </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/laptops/lenovoYogaBook.png" alt="pic"></img>
                <h3>Lenovo Yoga Book 9 13IRU8 ultraportable laptop with Intel® Core™ i7-1355U processor up to 5.0 GHz, 2 x 13.3", 2.8K, OLED, Touch, 16GB, 1TB SSD, Intel® Iris® Xe Graphics, Windows 11 Home, Tidal Teal, 3y on-site, Premium Care
                </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>

        </article>
    </section>

    <!-- INCLUDING THE FOOTER -->
    <?php
    include "../includes/LoggedIn_product_footer.php";
    ?>
</body>

</html>