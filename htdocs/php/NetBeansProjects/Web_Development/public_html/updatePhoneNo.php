<?php
// update_email.php
include 'config.php';

if (isset($_GET['phoneno']) && isset($_GET['id'])) {
    $new_phoneno = $_GET['phoneno'];
    $user_id = $_GET['id'];

    // Perform the database update
    $update_query = mysqli_query($conn, "UPDATE `users` SET phoneno='$new_phoneno' WHERE id='$user_id'");
    
    if ($update_query) {
        // Update successful
        echo "Phone no updated successfully!";
    } else {
        // Update failed
        echo "Failed to update the Phone no.";
    }
}
?>
