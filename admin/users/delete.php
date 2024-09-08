<?php

include "../../includes/config.php";

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $stmt = $conn->prepare("DELETE FROM users WHERE email=?");
    $stmt->bind_param("s", $email);

    $sql = "DELETE FROM users WHERE id='$id'";

    $result = $conn->query($sql);

    if ($stmt->execute()) {
        header("Location: view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $result->error;
    }
}
