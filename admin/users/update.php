<?php
include "../../includes/config.php";

$id = $_GET['updateid'];

$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

$name = $row['Name'];
$age = $row['Age'];
$email = $row['Email'];
$password = $row['Password'];



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET id=$id, name='$name', age='$age', email='$email', password='$password' WHERE id='$id'";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error: Update for User" . $name . "Failed!";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../assets/images/logo.png" type="image/x-icon">
    <!-- Core styles -->
    <link rel="stylesheet" href="../../assets/css/config.css">

    <title>Create a User</title>
</head>

<body>

    <div id="form-container">
        <h1>Create an Account</h1>
        <form class="create-form" method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" autocomplete="off" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="text" name="age" class="form-control" placeholder="Enter your age" autocomplete="off" value="<?php echo $age; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off" value="<?php echo $email; ?>">
                <p class="form-text">We'll never share your email with anyone else.</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" autocomplete="off" value="<?php echo $password; ?>">
            </div>
            <button type="submit" name="submit" class="form-btn">Submit</button>
        </form>
    </div>
</body>

</html>