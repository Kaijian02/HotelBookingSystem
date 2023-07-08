<?php
include 'config.php';

if (isset($_POST['add'])) {

    $room_name = $_POST['name'];
    $room_price = $_POST['price'];
    $room_image = $_FILES['image']['name'];
    $room_image_tmp_name = $_FILES['image']['tmp_name'];
    $room_image_folder = 'img/' . $room_image;

    if (empty($room_name) || empty($room_price) || empty($room_image)) {
        echo "<script>alert('Please fill in the name, price and image.')</script>";
    } else {
        $insert = "INSERT INTO room(name, price, image_path) VALUES('$room_name', '$room_price', '$room_image')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($room_image_tmp_name, $room_image_folder);
            echo "<script>alert('New room added.')</script>";
        } else {
            echo "<script>alert('Failed to add room.')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Rooms</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/adminstyle.css">
        <script>
            function previewImage() {
                var fileInput = document.getElementById('image');
                var imagePreview = document.getElementById('image-preview');
                var file = fileInput.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }

                reader.readAsDataURL(file);
            }
        </script>
    </head>
    <body>
        <div class="sidenav">
            <h1 style="color: #cdcdcd;text-align: center;padding: 10px;font-size: 25px;">S &AMP; C Hotel Booking System</h1>
            <a href="AdminAction.php" style="padding-top: 100px;">Add Rooms</a>
            <a href="AdminEdit.php">Rooms</a>
            <a href="AdminBookings.php">Bookings</a>
            <a href="Login.php">Logout</a>
        </div>
        <div class="container">
            <h1 style="text-align: center;">Add Rooms</h1>
            <div style="width: 50%; align-self: center; float: right;">
                <img id="image-preview" alt="Selected Image"/>
            </div>
            <div class="row">
                <div style="width: 50%; ">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name">

                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" min="0" step="0.01">

                        <label for="picture">Picture:</label>
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" id="image" class="box" onchange="previewImage()">

                        <input type="submit" value="Add" name="add">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
