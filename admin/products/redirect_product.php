<?php
session_start();

if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
    header("../admins/admin_login.php");
} else {
    echo '<div class="message">Successfully added a new product. <a href="../admins/home.php">Click Here</a> to return home!</div>';
}
?>



<style>
    .message {
        text-align: center;
        margin-top: 90px;
    }

    .message a {
        color: skyblue;
        text-decoration: none;
        cursor: pointer;
        transition: 0.4s ease-in-out;
    }

    .message a:hover {
        color: red;
    }
</style>