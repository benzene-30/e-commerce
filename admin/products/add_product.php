<?php
session_start();
include "../../includes/config.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    // Handling the file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Define allowed file extensions
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directory where the image will be stored
            $uploadFileDir = '../../uploads/';
            // Create a unique file name
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Insert the product details along with the image filename into the database
                $sql = "INSERT INTO products (name, price, image, description, category) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sdsss", $name, $price, $newFileName, $description, $category);

                if ($stmt->execute()) {
                    header("Location: redirect_product.php");
                } else {
                    echo "Failed to add the new product!";
                }

                $stmt->close();
                $conn->close();
            } else {
                echo 'Error moving the file to the upload directory. Check permissions.';
            }
        } else {
            echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
    } else {
        echo 'No image was uploaded or there was an error.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            font-size: 12px;
        }

        .upload {
            width: 100%;
        }
    </style>

    <!-- Core styles -->
    <link rel="stylesheet" href="../../assets/css/config.css">

    <title>New Product</title>
</head>

<body>

    <div class="form-container">
        <div class="form-logo">
            <a href="#"><img src="../../assets/images/logo.png" class="logo" alt="logo image"></a>
        </div>

        <h1>Add a New Product</h1>
        <form class="create-form" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter the product name" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" min="0" step="0.01" name="price" class="form-control" placeholder="Enter the price" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control upload" placeholder="Select the image">
                <p class="form-text">Select the right image.</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control" placeholder="Describe the product" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" placeholder="Enter the product category / type" autocomplete="off">
            </div>
            <button type="submit" name="submit" class="form-btn">Submit</button>
        </form>
    </div>
</body>

</html>