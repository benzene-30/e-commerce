<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Remove product from the cart session
    if (isset($_SESSION['cart'])) {
        $index = array_search($product_id, $_SESSION['cart']);
        if ($index !== false) {
            unset($_SESSION['cart'][$index]);
            // Reindex the array to prevent gaps
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
    echo "Product removed successfully";
}
