<?php
// update_password.php
include 'config.php';

if (isset($_GET['password']) && isset($_GET['id'])) {
    $new_password = md5($_GET['password']);
    $user_id = $_GET['id'];

    // Perform the database update
    $update_query = mysqli_query($conn, "UPDATE `users` SET password='$new_password' WHERE id='$user_id'");
    
    if ($update_query) {
        // Update successful
        echo "Password updated successfully!";
    } else {
        // Update failed
        echo "Failed to update the password.";
    }
}
?>
