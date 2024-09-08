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

    <title>Phones</title>
</head>

<body>
    <!-- INCLUDING THE HEADER -->
    <?php
    include "../includes/LoggedIn_product_header.php";
    ?>

    <!-- HERO SECTION -->
    <div>
        <img src="../assets/images/phone-back.jpg" alt="Hero Image" class="hero-img">
    </div>

    <!-- CONTENT SECTION -->
    <section class='content-info'>
        <h1 class='title'>UK.STORE</h1>
        <h6 class='title'>Mobile Phones and Accessories</h6>
        <article class='container'>
            <div class="card mx my">
                <img src="../assets/images/phones/samsungS24.png" alt="pic"></img>
                <h3>Mobile phone Samsung Galaxy S24 Ultra, Dual SIM, 12GB RAM, 256GB, 5G, Titanium Black
                </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
                </button>
            </div>
            <div class="card mx my">
                <img src="../assets/images/phones/samsungS21.png" alt="pic"></img>
                <h3>Mobile phone Samsung Galaxy S24 Ultra, Dual SIM, 12GB RAM, 256GB, 5G, Titanium Black
                </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/phones/iphone-15-pro-max.png" alt="pic"></img>
                <h3>Mobile phone Apple iPhone 15 Pro Max, 256GB, 5G, Natural Titanium
                </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/phones/xiomi14Ultra.jpg" alt="pic"></img>
                <h3>Promo package: Xiaomi 14 Ultra mobile phone, 16GB RAM, 512GB, 5G, Black + Xiaomi 14 Ultra Photography Kit
                </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/phones/onePlus12.png" alt="pic"></img>
                <h3>Mobile phone OnePlus 12, Dual SIM, 16GB RAM, 512GB, 5G, Silky gold
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