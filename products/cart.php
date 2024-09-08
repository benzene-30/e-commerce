<?php
session_start();
include "../includes/config.php";

// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<div class='message'>Your cart is empty!</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>

    <link rel="stylesheet" href="../assets/css/add_to_cart.css">

</head>

<body>

    <h1>Your Cart</h1>

    <?php
    // Fetching product details for each product in the cart
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id) {
            // Cast $product_id to an integer to prevent SQL injection
            $product_id = (int)$product_id;

            // Query to get product details based on product_id
            $sql = "SELECT * FROM products WHERE ID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display the product details in the cart
                    $name = $row['Name'];
                    $price = $row['price'];
                    $image = $row['image'];
                    $description = $row['description'];

                    echo '
                    <section id="section-' . $product_id . '" class="container">
                        <div class="cart-item" id="item-' . $product_id . '">
                            <img src="../uploads/' . $image . '" alt="' . $name . '" class="product-image">
                            <h3>' . $name . '</h3>
                            <p id="price-' . $product_id . '" data-unit-price="' . $price . '">Price: $' . $price . '</p>
                            <p>Description: ' . $description . '</p>
                            <p>Quantity: <span id="quantity-' . $product_id . '">1</span></p>
                            <hr>
                        </div>
                        
                        <div class="btn-cont">
                            <button class="btn" onclick="updateQuantity(' . $product_id . ', \'increase\')">&#43;</button>
                            <button class="btn" onclick="updateQuantity(' . $product_id . ', \'decrease\')">&#8722;</button>
                        </div>
                    </section>';
                }
            } else {
                echo "<div class='message'>Product not found for ID: $product_id<br></div>";
            }
        }
    } else {
        echo "<div class='message'>Your cart is empty!</div>";
    }
    ?>

    <hr>
    <div id="total-price">Total: $0.00</div>

</body>

<script src="../assets/js/add_to_cart.js"></script>

</html>