<?php
include "../../includes/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/logo.png" type="image/x-icon">
    <!-- Core styles -->
    <link rel="stylesheet" href="../../assets/css/config.css">
    <style>
        .view-users-title {
            text-align: center;
            margin-top: 12px;
            text-decoration: 6px underline;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div id="view-container">
        <h1 class="view-users-title">PRODUCTS</h1>
        <table class="table">
            <thead>
                <tr>
                    <td class="data-info">#</td>
                    <td class="data-info">NAME</td>
                    <td class="data-info">PRICE</td>
                    <td class="data-info">IMAGE STATE</td>
                    <td class="data-info">DESCRIPTION</td>
                    <td class="data-info">CATEGORY</td>
                    <td class="data-info">ACTION</td>
                    <td class="data-info">DATE CREATED</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {

                    //Used to orderly display the user numbers
                    $userSerial_no = 1;

                    $image_flag = 0; //Tells if a product's image was uploaded or not.
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['ID'];
                        $name = $row['Name'];
                        $price = $row['price'];
                        $image = $row['image'];
                        $description = $row['description'];
                        $category = $row['category'];
                        $created_at = $row['created_at'];

                        if (!empty($image)) { //Shows 1 if the image was uploaded successfully
                            $image_flag = 1;

                            //Outputing the data from the database
                            echo '<tr>
                                <td class="data-info">' . $userSerial_no . '</td>
                                <td class="data-info">' . $name . '</td>
                                <td class="data-info">' . $price . '</td>
                                <td class="data-info">' . $image_flag . '</td>
                                <td class="data-info">' . $description . '</td>
                                <td class="data-info">' . $category . '</td>

                                <td class="btn-data-info">
                                    <button class="btn-primary"><a href="update_product.php?updateid=' . $id . '" class="text-light">Update</a></button>
                                </td>

                                <td>' . $created_at . '</td>
                        </tr>';
                        } else {
                            $image_flag = 0;

                            //Outputing the data from the database
                            echo '<tr>
                               <td class="data-info">' . $userSerial_no . '</td>
                               <td class="data-info">' . $name . '</td>
                               <td class="data-info">' . $price . '</td>
                               <td class="data-info">' . $image_flag . '</td>
                               <td class="data-info">' . $description . '</td>
                               <td class="data-info">' . $category . '</td>

                               <td class="btn-data-info">
                                   <button class="btn-primary"><a href="update_product.php?updateid=' . $id . '" class="text-light">Update</a></button>
                               </td>

                               <td>' . $created_at . '</td>
                       </tr>';
                        }
                        $userSerial_no++;
                    }
                } else {
                    echo "Error: Unfortunately, No user was found in the Database.";
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>