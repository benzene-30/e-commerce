<?php
session_start();

include "../includes/config.php";

// Check if product_id is sent via POST
if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Check if the cart session exists; if not, create it
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the product to the cart session
    $_SESSION['cart'][] = $product_id;

    echo "Product ID: $product_id <br>";
    echo "Product added to cart.<br>";

    // Debug: Output current cart contents
    echo '<pre>';
    print_r($_SESSION['cart']);
    echo '</pre>';

    // Redirect back to the product page or elsewhere
    header("Location:" . $_SERVER['HTTP_REFERER']);
    // exit();
} else {
    echo "Product ID not found.";
}
