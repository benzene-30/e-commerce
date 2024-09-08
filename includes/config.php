<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uk-store";

//Establishing a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

//Error handling
if (!$conn) {
    echo "Failed to connect to the database.";
    exit();
} else {
    echo '<div id="message">Successfully Connected to the database!</div>';
}
?>

<script>
    setTimeout(function() {
        document.getElementById('message').style.display = 'none';
    }, 2000);
</script>