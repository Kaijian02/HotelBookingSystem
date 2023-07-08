<?php
include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['fullname'])) {
    header("Location: Home.php");
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['confirmpassword']);
    $phoneNo = $_POST['phoneno'];

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (name, email, password, phoneno)
					VALUES ('$name', '$email', '$password', '$phoneNo')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                //echo "<script>alert('Registration Completed.')</script>";
                $name = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                $phoneNo = "";
                echo "<script>alert('Registration Completed.'); window.location.href = 'Login.php';</script>";
                exit();
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        } else {
            echo "<script>alert('This email already exists.')</script>";
        }
    } else {
        echo "<script>alert('Password and Confirm password are not the same.')</script>";
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <script src="https://kit.fontawesome.com/1527c486de.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <style>
            .container-login{
                width: 350px;
                min-height: 350px;
                margin-top: 40px;
                background: #B7A4A1;
                border-radius: 20px;
                box-shadow: 0 0 5px rgba(0,0,0,.3);
                padding: 40px 30px;
            }

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
        <div class='container-login'>  
            <form action="" method="POST" class="form-login">
                <p class="text">Register</p>
                <div class="field">             
                    <input type="text" placeholder="Full name" name="name" id="firstname" required>
                </div>



                <div class="field">             
                    <input type="email" placeholder="Email" name="email" id="email" required>
                </div>

                <div class="field">             
                    <input type="password" placeholder="Password" name="password" id="password" required>
                </div>

                <div class="field">             
                    <input type="password" placeholder="Confirm password" name="confirmpassword" id="confirmpassword" required>
                </div>

                <div class="field">             
                    <input type="number" placeholder="Phone no" name="phoneno" id="phone" required>
                </div>

                <div class="field2" style="margin-left: 12px;;">
                    <label for="terms">I agree to the terms and conditions</label>
                    <input type="checkbox" name="terms" id="terms" required>
                </div>

                <div class="field">
                    <button name="submit" class="button">Register</button>
                </div>	

                <p class="register-text">Already have an account click -><a href="Login.php">Here!</a></p>	
            </form>
        </div>
    </body>
</html>
