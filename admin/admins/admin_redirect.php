<?php
echo '<div class="message">Successfully created your account. <a href="admin_login.php">Click Here</a> to login!</div>';
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