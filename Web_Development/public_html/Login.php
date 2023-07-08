<?php
include 'config.php';

session_start();
error_reporting(0);

if (isset($_SESSION['name'])) {
    header("Location: Home.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['name'] = $row['name'];
                $_SESSION['users_id'] = $row['id'];
		header("Location: Home.php");
	} else {
		echo "<script>alert('Email or Password is Wrong.')</script>";
	}
}

?>



<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <script src="https://kit.fontawesome.com/1527c486de.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>
            

            body{
                width: 100%;
                min-height: 100vh;
                background-position: center;
                background-size: cover;
                background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(img/login2.jpg);
            }

        </style>
    </head>
    <body style="background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(img/login2.jpg);">
        <div class="container-login">
            <form action="" method="POST" class="form-login">
                <p class="text">Login</p>
                <div class="field">
                    
                    <input type="email" placeholder="Email" name="email" id="email" required>
                </div>
                <div class="field">
                 
                    <input type="password" placeholder="Password" name="password" id="password" required>
                </div>
                <div class="field">
                    <button name="submit" class="button">Login</button>
                </div>

                <p class="register-text">No account yet? <a href="Register.php">Register here!</a></p>	
            </form>
        </div>
</html>
