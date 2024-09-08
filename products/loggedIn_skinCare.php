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

    <title>Skin Care</title>
</head>

<body>
    <!-- INCLUDING THE HEADER -->
    <?php
    include "../includes/LoggedIn_product_header.php";
    ?>

    <!-- HERO SECTION -->
    <div>
        <img src="../assets/images/skinCare-back.jpg" alt="Hero Image" class="hero-img">
    </div>

    <!-- CONTENT SECTION -->
    <section class='content-info'>
        <h1 class='title'>UK.STORE</h1>
        <h6 class='title'>Skin Care</h6>
        <article class='container'>
            <div class="card mx my">
                <img src="../assets/images/skin care/Eye-contour-cream.png" alt="pic"></img>
                <h3>Eye contour cream, Snail Repair Eye Cream, Mizon, 15 ml </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
                </button>
            </div>
            <div class="card mx my">
                <img src="../assets/images/skin care/Elmiplant Skin Moisture.png" alt="pic"></img>
                <h3>Elmiplant Skin Moisture 25+ Day Moisturizing Cream for normal/mixed skin, 50 ml </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/skin care/Black Snail All In One.png" alt="pic"></img>
                <h3>Multifunctional anti-wrinkle repair cream with 90% snail secretion, Black Snail All In One Cream, Mizon, 75 ml </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/skin care/Intensive moisturizingCream.png" alt="pic"></img>
                <h3>Intensive moisturizing cream 72H, Vichy Mineral 89 with hyaluronic acid and niacinamide for all skin types, 50ml </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/skin care/ROSE-HEAVEN -SERUM.png" alt="pic"></img>
                <h3>THE SKIN HOUSE ROSE HEAVEN SERUM 50ml </h3>
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