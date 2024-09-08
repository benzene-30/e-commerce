<?php
session_start();

include "../includes/config.php";

// Checking if the user is logged in
$loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon">

    <!-- Component Styles -->
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/home_navbar.css">
    <link rel="stylesheet" href="../assets/css/products.css">

    <title>Phones</title>
</head>

<body>

    <?php if ($loggedIn): ?>

        <!-- FOR LOGGED IN USERS -->

        <!-- INCLUDING THE HEADER -->
        <?php include "../includes/LoggedIn_product_header.php"; ?>

    <?php else: ?>

        <!-- FOR NON-LOGGED IN USERS -->

        <!-- INCLUDING THE HEADER -->
        <?php include "../includes/product_header.php"; ?>

    <?php endif; ?>

    <!-- HERO SECTION -->
    <div>
        <img src="../assets/images/phone-back.jpg" alt="Hero Image" class="hero-img">
    </div>

    <!-- CONTENT SECTION -->
    <section class='content-info'>
        <h1 class='title'>UK.STORE</h1>
        <h6 class='title'>Mobile Phones and Accessories</h6>

        <article class='container'>
            <?php
            // Fetching products with category 'phone'
            $sql = "SELECT * FROM products WHERE category = 'phone'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['ID'];
                    $product_name = $row['Name'];
                    $product_price = $row['price'];
                    $product_image = $row['image'];
                    $product_description = $row['description'];

                    // Display product card
                    echo '
                    <div class="card mx my">
                        <img src="../uploads/' . $product_image . '" alt="' . $product_name . '">
                        <h3>' . $product_name . '</h3>
                        <h5>' . $product_description . '</h5>
                        <h5>Price: $' . $product_price . '</h5>
                        <form method="POST" action="add_to_cart.php">
                            <input type="hidden" name="product_id" value="' . $product_id . '">
                            <button type="submit" class="btn-info">
                                <img src="../assets/images/cart.png" class="cart-btn" alt="Add to cart">
                            </button>
                        </form>
                    </div>';
                }
            } else {
                echo "<p>No products available in this category.</p>";
            }
            ?>
        </article>
    </section>

    <!-- INCLUDING THE FOOTER FOR ALL USERS -->
    <?php include "../includes/product_footer.php"; ?>

</body>

</html>