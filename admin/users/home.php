<?php

session_start();


//Checking if the user was logged IN
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/logo.png" type="image/x-icon">

    <!-- Core Styles -->
    <link rel="stylesheet" href="../../assets/css/styles.css">

    <!-- Component Styles -->
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="../../assets/css/home_navbar.css">

    <title>home</title>
</head>

<body>
    <!-- INCLUDING THE HEADER -->
    <?php
    include "../../includes/home_header.php";
    ?>

    <!-- HERO SECTION -->
    <div>
        <img src="../../assets/images/shopping.jpg" alt="Hero Image" class="hero-img">
    </div>

    <!-- CONTENT SECTION -->
    <section class='content-info'>
        <p class="title">Welcome <?php echo htmlspecialchars($_SESSION['name']); ?>!</p>
        <h1 class='title'>UK.STORE</h1>
        <article class='container'>

            <div class="card mx my">
                <img src="../../assets/images/phone.jpg" alt="pic"></img>
                <h3>Mobile Phones and Accessories</h3>
                <a href="../../products/phone.php"> <button class='btn-info'>View</button>
                </a>
            </div>

            <div class="card mx my">
                <img src="../../assets/images/laptop-back.jpg" alt="pic"></img>
                <h3>Laptops</h3>
                <a href="../../products/LoggedIn_laptop.php"> <button class='btn-info'>View</button>
                </a>
            </div>

            <div class="card mx my">
                <img src="../../assets/images/clothing.jpg" alt="pic"></img>
                <h3>Clothing</h3>
                <a href="../../products/LoggedIn_clothing.php"> <button class='btn-info'>View</button>
                </a>
            </div>

            <div class="card mx my">
                <img src="../../assets/images/snacks-food-back.jpg" alt="pic"></img>
                <h3>Snacks and Food</h3>
                <a href="../../products/loggedIn_snacks_food.php"> <button class='btn-info'>View</button>
                </a>
            </div>

            <div class="card mx my">
                <img src="../../assets/images/skinCare.jpg" alt="pic"></img>
                <h3>Skin Care</h3>
                <a href="../../products/LoggedIn_skinCare.php"> <button class='btn-info'>View</button>
            </div>

        </article>
    </section>

    <!-- INCLUDING THE FOOTER -->
    <?php
    include "../../includes/home_footer.php";
    ?>
</body>

</html>