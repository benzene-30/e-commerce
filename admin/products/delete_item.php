<?php

include "../../includes/config.php";

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM products WHERE id='$id'";

    $result = $conn->query($sql);

    if ($result === true) {
        header("Location: delete_product.php");
    } else {
        echo "Error: " . $sql . "<br>" . $result->error;
    }
}
