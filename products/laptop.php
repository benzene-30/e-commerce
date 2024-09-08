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
    <?php if ($loggedIn): ?>

        <!-- INCLUDING THE HEADER -->
        <?php
        include "../includes/product_header.php";
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
                <?php
                //Obtaingin the product information from the database

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                $num = 0;
                $product = array();


                if ($result && $result->num_rows > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $product_id = $row['ID'];
                        $product_name = $row['Name'];
                        $product_price = $row['price'];
                        $product_image = $row['image'];
                        $product_description = $row['description'];
                        $product_category = $row['category'];

                        //Table name
                        $table_name = "laptop";


                        if ($product_category === $table_name) {
                            global $num;
                            $product[] = $product_id;
                            $num++;
                        }
                    }

                    //$index will be used to iterate through the loop in order not to affect $num
                    $index = $num;

                    while ($index != 0) {

                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);



                        if ($result && $result->num_rows > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                $product_id = $row['ID'];
                                $product_name = $row['Name'];
                                $product_price = $row['price'];
                                $product_image = $row['image'];
                                $product_description = $row['description'];
                                $product_category = $row['category'];

                                for ($i = 0; $i < $num; $i++) {

                                    //Checking if the ID of a current product matches the one in the array
                                    if ($product[$i] === $product_id) {
                                        echo ' <div class="card mx my">
                                        <img src="../uploads/' . $product_image . '" alt="pic">
                                        <h3>' . $product_name . '</h3>
                                        <h5>' . $product_description . '</h5>
                                        <form method="POST" action="add_to_cart.php">
                                            <input type="hidden" name="product_id" value="' . $product_id . '">
                                            <button type="submit" class="btn-info">
                                                <img src="../assets/images/cart.png" class="cart-btn" alt="Add to cart">
                                            </button>
                                        </form>
                                    </div>
                                    ';
                                        $index--;
                                    }
                                }
                            }
                        } else {
                            echo "The database is empty!";
                        }
                    }
                } else {
                    echo "No Product exists in the database!";
                    exit();
                }
                ?>

            </article>
        </section>


    <?php else: ?>

        <!-- FOR NON-LOGGED IN USERS -->

        <!-- INCLUDING THE HEADER -->
        <?php
        include "../includes/product_header.php";
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
                <?php
                //Obtaingin the product information from the database

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                $num = 0;
                $product = array();


                if ($result && $result->num_rows > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $product_id = $row['ID'];
                        $product_name = $row['Name'];
                        $product_price = $row['price'];
                        $product_image = $row['image'];
                        $product_description = $row['description'];
                        $product_category = $row['category'];

                        //Table name
                        $table_name = "laptop";


                        if ($product_category === $table_name) {
                            global $num;
                            $product[] = $product_id;
                            $num++;
                        }
                    }

                    //$index will be used to iterate through the loop in order not to affect $num
                    $index = $num;

                    while ($index != 0) {

                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);



                        if ($result && $result->num_rows > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                $product_id = $row['ID'];
                                $product_name = $row['Name'];
                                $product_price = $row['price'];
                                $product_image = $row['image'];
                                $product_description = $row['description'];
                                $product_category = $row['category'];

                                for ($i = 0; $i < $num; $i++) {

                                    //Checking if the ID of a current product matches the one in the array
                                    if ($product[$i] === $product_id) {
                                        echo ' <div class="card mx my">
                                        <img src="../uploads/' . $product_image . '" alt="pic">
                                        <h3>' . $product_name . '</h3>
                                        <h5>' . $product_description . '</h5>
                                        <form method="POST" action="add_to_cart.php">
                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                        <button type="submit" class="btn-info">
                                            <img src="../assets/images/cart.png" class="cart-btn" alt="pic">
                                        </button>
                                    </form>
                                    </div>
                                    ';
                                        $index--;
                                    }
                                }
                            }
                        } else {
                            echo "The database is empty!";
                        }
                    }
                } else {
                    echo "No Product exists in the database!";
                    exit();
                }
                ?>

            </article>
        </section>

    <?php endif; ?>


    <!-- INCLUDING THE FOOTER -->
    <?php
    include "../includes/product_footer.php";
    ?>
</body>

</html>