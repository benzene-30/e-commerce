<?php
include "../../includes/config.php";

$id = $_GET['updateid'];

// Fetching the existing admin data based on ID
$sql = "SELECT * FROM admins WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $stmt);
$stmt->execute();

$result = $stmt->get_result();
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


    //Handling user input error
    if (empty($name) || empty($age) || empty($email) || empty($password)) {
        echo "Error: Ensure all fields are filled correctly!";
    } else {

        $email_valid = $conn->prepare("SELECT * FROM admins WHERE email=?");
        $email_valid->bind_param("s", $email);
        $email_valid->execute(); // Execute the prepared statement


        $valid_result = $email_valid->get_result();

        if ($valid_result && $valid_result->num_rows > 0) {

            //Obtaining the Admin data
            $admin = $valid_result->fetch_assoc();
            $db_password = $admin['Password'];

            if ($password === $db_password || password_verify($password, $db_password)) {

                $stmt = $conn->prepare("UPDATE admins SET name=?, age=?, email=?, password=? WHERE id=?");
                $stmt->bind_param("sissi", $name, $age, $email, $db_password, $id);

                //Executing the Query
                if ($stmt->execute()) {
                    header("Location: view_admin.php");
                    exit();
                } else {
                    echo "Error: Failed to edit the admin data!";
                }
            } elseif (!empty($password)) {  //code to execute if the user makes changes to the password

                $hashed_password = password_hash($password, PASSWORD_DEFAULT); //hash the text 

                $stmt = $conn->prepare("UPDATE admins SET name=?, age=?, email=?, password=? WHERE id=?");
                $stmt->bind_param("sissi", $name, $age, $email, $hashed_password, $id);

                //Executing the Query
                if ($stmt->execute()) {
                    header("Location: view_admin.php");
                    exit();
                } else {
                    echo "Error: Failed to edit the admin data!";
                    exit();
                }
            } else {
                echo "Invalid admin credentials. Make sure all data are correct and are well filled...";
                exit();
            }
        } else {
            echo "No user exists in the database!";
            exit();
        }
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
        <h1>Update the Admin Account</h1>
        <form class="create-form" method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" autocomplete="off" value="<?php echo htmlspecialchars($name); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="text" name="age" class="form-control" placeholder="Enter your age" autocomplete="off" value="<?php echo  htmlspecialchars($age); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off" value="<?php echo  htmlspecialchars($email); ?>">
                <p class="form-text">We'll never share your email with anyone else.</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" autocomplete="off" value="<?php echo  htmlspecialchars($password); ?>">
            </div>
            <button type="submit" name="submit" class="form-btn">Submit</button>
        </form>
    </div>
</body>

</html>