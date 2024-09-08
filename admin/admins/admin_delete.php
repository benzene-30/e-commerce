<?php

include "../../includes/config.php";

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM admins WHERE id='$id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {

        include "admin_logout.php";
        header("Location: admin_view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $result->error;
    }
}
