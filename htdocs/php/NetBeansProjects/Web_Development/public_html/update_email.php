<?php
// update_email.php
include 'config.php';

if (isset($_GET['email']) && isset($_GET['id'])) {
    $new_email = $_GET['email'];
    $user_id = $_GET['id'];

    // Perform the database update
    $update_query = mysqli_query($conn, "UPDATE `users` SET email='$new_email' WHERE id='$user_id'");
    
    if ($update_query) {
        // Update successful
        echo "Email updated successfully!";
    } else {
        // Update failed
        echo "Failed to update the email.";
    }
}
?>
