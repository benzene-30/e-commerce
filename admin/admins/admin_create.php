<?php

include "../../includes/config.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    //Checking for user input failure

    if (!empty($name) || !empty($age) || !empty($email) || !empty($password)) {
        //Protecting the admin password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //Verifying the user input data


        $stmt = $conn->prepare("INSERT INTO admins (name, age, email, password) VALUES (?,?,?,?)");
        $stmt->bind_param("siss", $name, $age, $email, $hashed_password);

        //Validating the email address
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if ($stmt->execute()) {
                header("Location: admin_redirect.php");
            } else {
                echo "Error:" . $sql . "<br>" . $result->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Invalid Email Address!";
            exit();
        }
    } else {
        echo "Error: Please ensure all Fields are filled correctly! <br> Try Again!";
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .mb-3 .form-text {
            color: red;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 12px;
        }

        .form-label {
            text-align: start;
        }
    </style>

    <!-- Core styles -->
    <link rel="stylesheet" href="../../assets/css/config.css">

    <title>Create an Admin</title>
</head>

<body>

    <div class="form-container">
        <div class="form-logo">
            <a href="#"><img src="../../assets/images/logo.png" class="logo" alt="logo image"></a>
        </div>

        <h1>Create a new Admin</h1>
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
                <p class="form-text">Never share your email with anyone else.</p>
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