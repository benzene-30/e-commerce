<?php
include "../../includes/config.php";

$id = $_GET['updateid'];

// Fetching the existing admin data based on ID
$sql = "SELECT * FROM products WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$row = mysqli_fetch_assoc($result);

$name = $row['Name'];
$price = $row['price'];
$image = $row['image'];
$description = $row['description'];
$category = $row['category'];



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $category = $_POST['category'];


    //Handling user input error
    if (empty($name) || empty($price) || empty($image) || empty($image)) {
        echo "Error: Ensure all fields are filled correctly!";
    } else {

        $valid = $conn->prepare("SELECT * FROM products WHERE id=?");
        $valid->bind_param("i", $id);
        $valid->execute(); // Execute the prepared statement


        $valid_result = $valid->get_result();

        if ($valid_result && $valid_result->num_rows > 0) {

            $stmt = $conn->prepare("UPDATE products SET name=?, price=?, image=?, description=?, category=? WHERE id=?");
            $stmt->bind_param("sdbssi", $name, $price, $image, $description, $category, $id);

            //Executing the Query
            if ($stmt->execute()) {
                header("Location: view_product.php");
                exit();
            } else {
                echo "Error: Failed to edit the Product data!";
            }
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
                <label class="form-label">Price</label>
                <input type="decimal" min="0" step="0.09" name="price" class="form-control" placeholder="Enter your age" autocomplete="off" value="<?php echo  htmlspecialchars($price); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" placeholder="Enter your email" autocomplete="off" value="<?php echo  htmlspecialchars($image); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter your email" autocomplete="off" value="<?php echo  htmlspecialchars($description); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" placeholder="Enter your password" autocomplete="off" value="<?php echo  htmlspecialchars($category); ?>">
            </div>
            <button type="submit" name="submit" class="form-btn">Submit</button>
        </form>
    </div>
</body>

</html>