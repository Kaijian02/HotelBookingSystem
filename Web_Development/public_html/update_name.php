<?php
// update_name.php
include 'config.php';

if (isset($_GET['name']) && isset($_GET['id'])) {
    $new_name = $_GET['name'];
    $user_id = $_GET['id'];

    // Perform the database update
    $update_query = mysqli_query($conn, "UPDATE `users` SET name='$new_name' WHERE id='$user_id'");
    
    if ($update_query) {
        // Update successful
        
        echo "<script>alert('Name updated successfully!'); window.location.href = 'ChangePassword.php';</script>";
    } else {
        // Update failed
        echo "Failed to update the name.";
    }
}
?>
