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

    <title>Clothing</title>
</head>

<body>
    <!-- INCLUDING THE HEADER -->
    <?php
    include "../includes/LoggedIn_product_header.php";
    ?>

    <!-- HERO SECTION -->
    <div>
        <img src="../assets/images/clothing-back.jpg" alt="Hero Image" class="hero-img">
    </div>

    <!-- CONTENT SECTION -->
    <section class='content-info'>
        <h1 class='title'>UK.STORE</h1>
        <h6 class='title'>Clothing</h6>
        <article class='container'>
            <div class="card mx my">
                <img src="../assets/images/clothing/children-cloth.png" alt="pic"></img>
                <h3>Set of clothes for newborns with Disney characters, 5 pieces, 56 CM, Mickey Mouse Hello Happy </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
                </button>
            </div>
            <div class="card mx my">
                <img src="../assets/images/clothing/TatuumDress-sweater.png" alt="pic"></img>
                <h3>Tatuum, Dress-sweater with V-neckline and striped ends, Sand brown </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/clothing/Mididressmodel5White.png" alt="pic"></img>
                <h3>Midi dress model 5, White </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/clothing/DoItLaterSimspon.png" alt="pic"></img>
                <h3>Do It Later Simspon 100% Cotton Funny Print Casual Men's T-Shirt, Black, M
                </h3>
                <button class='btn-info'> <img src="../assets/images/cart.png" class="cart-btn" alt="pic"></img>
            </div>
            <div class="card mx my">
                <img src="../assets/images/clothing/Men's_shorts.png" alt="pic"></img>
                <h3>Men's shorts, BLEND, 541064, Navy blue, Lin </h3>
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