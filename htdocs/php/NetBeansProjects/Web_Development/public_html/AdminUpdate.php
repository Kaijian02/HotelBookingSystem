<?php
include 'config.php';

$id = $_GET['edit'];

if (isset($_POST['Edit'])) {

    $room_name = $_POST['name'];
    $room_price = $_POST['price'];
    $room_description = $_POST['description'];
    $room_image = $_FILES['image']['name'];
    $room_image_tmp_name = $_FILES['image']['tmp_name'];
    $room_image_folder = 'img/' . $room_image;

    if (empty($room_name) || empty($room_price) || empty($room_image) || empty($room_description)) {
        echo "<script>alert('Please fill in the name, price and image.')</script>";
    } else {

        $update_data = "UPDATE room SET name='$room_name', price='$room_price', image_path='$room_image', description='$room_description'  WHERE id = '$id'";
        $upload = mysqli_query($conn, $update_data);

        if ($upload) {
            move_uploaded_file($room_image_tmp_name, $room_image_folder);
            echo "<script>alert('Room edited'); window.location.href = 'AdminEdit.php';</script>";
        } else {
            echo "<script>alert('Please fill in the name, price and image.')</script>";
        }
    }
};
?>



<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/adminstyle.css">

        <script>
            function previewImage() {
                var fileInput = document.getElementById('image');
                var imagePreview = document.getElementById('image-preview');
                var file = fileInput.files[0];
                var reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };

                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.src = 'img/transparent.jpg'; // Set default transparent image
                }
            }
        </script>
    </head>


    <body>

        <div style="margin-left:150px; margin-top: 50px; font-size: 20px;">
            <a href="AdminEdit.php" class="add-btn">Back</a>
        </div>
        <div class="container" style="margin-left: 300px;">     
            <h1 style="text-align: center;">Edit Rooms</h1>
            <div style="width: 50%; align-self: center; float: right;">
                <img id="image-preview" src="img/transparent.jpg" alt="Selected Image">
                
            </div>
            <div class="row">
                <div style="width: 50%; ">
                    <?php
                    $select = mysqli_query($conn, "SELECT * FROM room WHERE id = '$id'");
                    while ($row = mysqli_fetch_assoc($select)) {
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" placeholder="Enter room name" value="<?php echo $row['name']; ?>">

                            <label for="price">Price:</label>
                            <input type="number" id="price" placeholder="Enter room price" name="price" value="<?php echo $row['price']; ?>" min="0" step="0.01">

                            <label for="descriptionL">Description:</label>

                            <textarea id="description" name="description" placeholder="Enter room description" value="<?php echo $row['description']; ?>" row="5" style="width: 305.02px;height: 100px;margin: 10px;padding: 10px;font-size: 16px;border-radius: 5px;border: none;box-shadow: 2px 2px 2px rgba(0,0,0,0.3);"></textarea>


                            <label for="picture">Picture:</label>

                            <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" id="image" class="box" onchange="previewImage()">

                            
                                <input type="submit" value="Edit" name="Edit">
                            
                        </form>
                    <?php }; ?>
                </div>

            </div>
        </div>
    </body>
</html>

