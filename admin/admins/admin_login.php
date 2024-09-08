<?php

session_start(); // Start the session at the very beginning


include "../../includes/config.php";

if (isset($_POST['submit'])) {
    $email  = $_POST['email'];
    $password  = $_POST['password'];


    //Validating Input Error
    if (!empty($email)) {

        if (!empty($password)) {

            //Sanitizing the user input
            $stmt = $conn->prepare("SELECT * FROM admins WHERE email=?");
            $stmt->bind_param("s", $email);

            if ($stmt->execute()) {

                //Getting the result from the SQL statement above
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {

                    //Obtaining the user's Password
                    $user = $result->fetch_assoc();
                    $db_password = $user['Password'];

                    if (password_verify($password, $db_password)) {

                        //Setting Session variables
                        $_SESSION['user_id'] = $user['ID'];
                        $_SESSION['name'] = $user['Name'];
                        $_SESSION['email'] = $user['Email'];
                        $_SESSION['password'] = $user['Password'];
                        $_SESSION['logged_in'] = true;

                        header("Location: home.php");
                        exit();
                    } else {
                        echo "Invalid Email and Password";
                        exit();
                    }
                } else {
                    echo "User does not exist! . <br> . Please create an account";
                }
            }
        } else {
            echo "<p>Enter a password!</p>";
        }
    } else {
        echo "<p>Enter Your Email Address!</p>";
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../assets/images/logo.png" type="image/x-icon">
    <!-- Core styles -->
    <link rel="stylesheet" href="../../assets/css/config.css">
    <style>
        .form-control {
            width: 500px;
            height: 34px;
            border-radius: 5px;
        }

        .form-label {
            text-align: start;
        }

        .mb-3 .form-text {
            color: red;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            text-align: start;
            font-size: 12px;
        }
    </style>
    <title>Admin Login</title>
</head>

<body>

    <div class="form-container">
        <div class="form-logo">
            <a href="#"><img src="../../assets/images/logo.png" class="logo" alt="logo image"></a>
        </div>
        <h1>Login as an Administrator</h1>
        <form class="create-form" method="POST">

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off">
                <p class="form-text">Never share your email with anyone else.</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" autocomplete="off">
            </div>

            <button type="submit" name="submit" class="form-btn">Login</button>

        </form>

    </div>
</body>

</html>