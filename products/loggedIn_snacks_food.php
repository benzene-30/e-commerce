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

    <title>Snacks and Food</title>
</head>

<body>
    <!-- INCLUDING THE HEADER -->
    <?php
    include "../includes/LoggedIn_product_header.php";
    ?>

    <!-- HERO SECTION -->
    <div>
        <img src="../assets/images/snacks-food-back.jpg" alt="Hero Image" class="hero-img">
    </div>

    <!-- CONTENT SECTION -->
    <section class='content-info'>
        <h1 class='title'>UK.STORE</h1>
        <h6 class='title'>Snacks and Food</h6>
        <article class='container'>
            <div class="card mx my">
                <img src="../assets/images/snacks food/Potato-chip.png" alt="pic"></img>
                <h3>Potato chips, EU, 90 g </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
                </button>
            </div>
            <div class="card mx my">
                <img src="../assets/images/snacks food/Haldiram's-Indian-Snacks.png" alt="pic"></img>
                <h3>Haldiram's Indian Snacks - 200g </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/snacks food/Up-coffee-capsules-10-capsules.png" alt="pic"></img>
                <h3>Tchibo Cafissimo XL Wake Up coffee capsules, 10 capsules, 85g </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/snacks food/handmade-vegan biscuit cake.png" alt="pic"></img>
                <h3>100% natural handmade vegan biscuit cake, without additives, preservatives or dyes, 150g, Hiper Ambrozia </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/snacks food/Cookies-from-flour-with-chocolate.png" alt="pic"></img>
                <h3>Cookies from flour with chocolate Mulino Bianco Cioccograno, 330g </h3>
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