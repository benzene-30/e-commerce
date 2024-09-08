<?php

include "../../includes/config.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hashing the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //Preventing Unauthorized access to data via SQL Injection

    $stmt = $conn->prepare("INSERT INTO users (name, age, email, password) VALUES (?,?,?,?)"); //$conn->prepare() method prepares the SQL statement for execution
    $stmt->bind_param("siss", $name, $age, $email, $hashed_password);  //the bind_param() method is used to bind the variables $name, $age, ... etc into the '?' above

    if (!empty($email) && !empty($hashed_password)) {

        //Validating the User Email address
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if ($stmt->execute()) {
                echo "Successfully added a new User!";
                header("Location: ../../redirect/login_redirect.php");
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close(); // Close the statement
            $conn->close(); // Close the connection
        } else {
            echo "Invalid Email Address";
        }
    } else {
        echo '<p style="text-align:center; margin-top:90px;">Error: Please fill the form CORRECTLY in order to create an account... <a href="create.php">Click here</a> to return</p>';
        exit();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Core styles -->
    <link rel="stylesheet" href="../../assets/css/config.css">

    <title>Create a User</title>
</head>

<body>

    <div class="form-container">
        <div class="form-logo">
            <a href="../../index.php"><img src="../../assets/images/logo.png" class="logo" alt="logo image"></a>
        </div>
        <h1>Create an Account</h1>
        <form class="create-form" method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" name="age" class="form-control" placeholder="Enter your age" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off">
                <p class="form-text">We'll never share your email with anyone else.</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" autocomplete="off">
            </div>
            <button type="submit" name="submit" class="form-btn">Submit</button>
        </form>
    </div>
</body>

</html>