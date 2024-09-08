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
        <h1 class="view-users-title">USERS</h1>
        <table class="table">
            <thead>
                <tr>
                    <td class="data-info">#</td>
                    <td class="data-info">NAME</td>
                    <td class="data-info">AGE</td>
                    <td class="data-info">EMAIL</td>
                    <td class="data-info">PASSWORD</td>
                    <td class="data-info">ACTION</td>
                    <td class="data-info">DATE CREATED</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM admins";
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {

                    //Used to orderly display the user numbers
                    $userSerial_no = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['ID'];
                        $name = $row['Name'];
                        $age = $row['Age'];
                        $email = $row['Email'];
                        $password = $row['Password'];
                        $created_at = $row['created_at'];


                        //Outputing the data from the database
                        echo '<tr>
                                <td class="data-info">' . $userSerial_no . '</td>
                                <td class="data-info">' . $name . '</td>
                                <td class="data-info">' . $age . '</td>
                                <td class="data-info">' . $email . '</td>
                                <td class="data-info">' . $password . '</td>

                                <td class="btn-data-info">
                                    <button class="btn-primary"><a href="update_admin.php?updateid=' . $id . '" class="text-light">Update</a></button>
                                    <button class="btn-danger"><a href="delete_admin.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                                </td>

                                <td>' . $created_at . '</td>
                        </tr>';

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