<?php
include 'config.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM room WHERE id = $id");
    echo "<script>alert('Room deleted')</script>";
    //header('location:AdminEdit.php');
};
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>View Rooms</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/adminstyle.css">
        <style>
            img{
                width: 250px;
                height: 170px;
            }
        </style>
    </head>
    <body>
        <div class="sidenav">


            <h1 style="color: #cdcdcd;text-align: center;padding: 10px;font-size: 25px;">S &AMP; C Hotel Booking System</h1>
            <a href="AdminAction.php" style="padding-top: 100px;">Add Rooms</a>
            <a href="AdminEdit.php">Rooms</a>
            <a href="AdminBookings.php">Bookings</a>
            <a href="Login.php">Logout</a>
        </div>


        <?php
        $select = mysqli_query($conn, "SELECT * FROM room");
        ?>

        <div class="container">
            <h1 style="text-align: center;">List of Rooms</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Room name</th>
                         <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                        <tr>
                            <td><img src="img/<?php echo $row['image_path']; ?>" height="100" width="120" alt=""></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>RM<?php echo number_format((float) $row['price'], "2", ".", ""); ?></td>                          
                            <td class="text">
                                <a href="AdminUpdate.php?edit=<?php echo $row['id']; ?>" class="btn-edit">Edit </a>
                                <a href="AdminEdit.php?delete=<?php echo $row['id']; ?>" class="btn-delete">Delete </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>

        </div>
    </body>
    
    
</html>

