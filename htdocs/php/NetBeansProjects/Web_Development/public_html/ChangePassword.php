<?php
session_start();
include 'config.php';

if (isset($_SESSION['users_id'])) {
    $user_id = $_SESSION['users_id'];
    $username = $_SESSION['name'];
//    echo "User id: " . $user_id;
//    echo "User name: " . $username;
}

if (!(isset($_SESSION['name']) && $_SESSION['name'] != '')) {
     echo "<script>alert('Please login to proceed the action.'); window.location.href = 'Login.php';</script>";
    die();
}

$newPasswordVisible = false;
if (isset($_POST['submit'])) {
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE id='$user_id' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $newPasswordVisible = true;
    } else {
        echo "<script>alert('Password is Wrong.')</script>";
    }
}

if (isset($_POST['change'])) {
    $newPassword = md5($_POST['newPassword']);
    $confirmPassword = md5($_POST['confirmPassword']);
    if ($newPassword != $confirmPassword) {
        //echo "<script>alert('New password and confirm password are not matched.')</script>";
        echo "<script>alert('New password and confirm password are not matched.'); window.location.href = 'ChangePassword.php';</script>";
        return;
    } else {
        $sql = "UPDATE users SET password='$newPassword' WHERE id='$user_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Password updated.')</script>";
        } else {
            echo "<script>alert('Password update failed.')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <script src="https://kit.fontawesome.com/1527c486de.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/js.js"></script>

        <style>
            .password-bullet {
                display: inline-block;
                width: 8px;
                height: 8px;
                margin-left: 1px;
                border-radius: 50%;
                background-color: black;
            }

            input[type="password"] {
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                margin-bottom: 0px;
                width: 90%;
            }
        </style>

    </head>
    <body>
        <!--Header-->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand logo" href="Home.html"><img src="img/logo2.png"  alt="Company Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="Home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Reservation.php">Room</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="About.php">About</a>
                        </li>
                    </ul>

                    <div class="search-container" style="margin-right: 110px;">
                        <form action="searchpage.php" method="GET">
                            <input type="text" placeholder="Search rooms" id="searchBar" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" name="search" style="margin-bottom:10px" required>
                            <button type="submit"><i class="fas fa-duotone fa-magnifying-glass fa-beat"></i>
                        </form>
                    </div>

                    <div class='user' style="margin-right:15px;">
                        <?php
                        if (isset($_SESSION['name'])) {
                            echo "<h6 style='margin-bottom:0px;'>Welcome, " . $_SESSION['name'] . "</h>";
                        } else {
                            echo "<a href='login.php'><i class='fa fa-user'></i> Login</a>";
                        }
                        ?>
                    </div>

                    <div class="dropdown-acc">
                        <button class="dropbtn">My Account</button>
                        <div class="dropdown-content">
                            <a href="BookingHistory.php">Booking History</a>
                            <a href="ChangePassword.php">Profile</a>
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--Header End-->

        <section >
            <div style="background-color: #f0f8ff; min-height: 630px;">


                <div class="title" style="margin-bottom: 0;">              
                    <h2 class="change-font">Profile</h1>
                </div>

                <div class="changePass-form">
                    <?php
                    if (isset($_SESSION['users_id'])) {
                        $user_id = $_SESSION['users_id'];
                    }
                    $select_profile = mysqli_query($conn, "SELECT * FROM `users` WHERE id='$user_id'");
                    if (mysqli_num_rows($select_profile) > 0) {
                        while ($row = mysqli_fetch_assoc($select_profile)) {
                            $name = $row['name'];
                            $email = $row['email'];
                            $phoneno = $row['phoneno'];
                            $password = $row['password'];
                            ?>
                            <div class="d-flex justify-content-center">
                                <div class="col-md-8" style="padding:20px;">

                                    <table>
                                        <thead>
                                            <tr>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align:left; width: 200px;">Name :</td>                                               
                                                <td>
                                                    <span id="nameValue"><?php echo $name; ?></span>                                                  
                                                </td>
                                                <td>
                                                    <i class="fa-solid fa-pen-to-square" onclick="confirmNameUpdate()"></i>                                                 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email :</td>
                                                <td>
                                                    <span id="emailValue"><?php echo $email; ?></span>                                                   
                                                </td>
                                                <td>
                                                    <i class="fa-solid fa-pen-to-square" onclick="confirmEmailUpdate()"></i>                                                    
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Phone no:</td>
                                                <td>
                                                    <span id="phoneValue">+60<?php echo $phoneno; ?></span>                                                   
                                                </td>
                                                <td>

                                                    <i class="fa-solid fa-pen-to-square" onclick="confirmPhoneUpdate()"></i>                                                                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                        <form action="" method="POST">
                                            <td>Old Password:</td>
                                            <td>
                                                <input type="password" name="password" placeholder="">                                                 
                                            </td>
                                            <td>
                                                <button type="submit" name="submit" style="border:0px; padding:0px; background-color: #f0f8ff">
                                                    <i class="fa-solid fa-right-to-bracket"></i>
                                                </button>                                          
                                            </td>
                                        </form>
                                        </tr>
                                        <form action="" method="POST">
                                            <tr <?php if (!$newPasswordVisible) echo 'style="display: none;"'; ?>>
                                                <td>New Password:</td>
                                                <td>
                                                    <input type="password" name="newPassword" placeholder="">                                                 
                                                </td>
                                            </tr>
                                            <tr <?php if (!$newPasswordVisible) echo 'style="display: none;"'; ?>>
                                                <td>Confirm Password:</td>
                                                <td>
                                                    <input type="password" name="confirmPassword" placeholder="">                                                 
                                                </td>
                                                <td>
                                                    <button type="submit" name="change" style="border:0px; padding:0px; background-color: #f0f8ff">
                                                        <i class="fa-solid fa-circle-check"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                        </form>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<div class='display-order'><span>your prebook is empty!</span></div>";
                    }
                    ?>
                </div>
            </div>

        </section>



        <!--Footer Start-->
        <footer>
            <div class="row" style="display:block;" >
                <div class="col-md-12">
                    <div style="background-color: black;">
                        <div class="row" >
                            <div class="col-md-3 contact">
                                <h3>Contact Us</h3>
                                <p>Email: SCHotel@gmail.com</p>
                                <p>Phone: 04-5235829</p>
                            </div>
                            <div class="col-md-3 info">
                                <h3>Information</h3>
                                <p>About Us</p>
                                <p>Terms and Conditions</p>
                            </div>
                            <div class="col-md-3 social">
                                <h3>Social</h3>
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="col-md-3 copyright">
                                <p>&copy; 2023 SC Hotel Company. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Footer End-->

        <script>
            function confirmNameUpdate() {
                var newName = prompt("Enter the new name:");
                if (newName) {
                    var confirmed = confirm("Are you sure you want to update the name to '" + newName + "'?");
                    if (confirmed) {
                        window.location.href = "update_name.php?name=" + encodeURIComponent(newName) + "&id=<?php echo $user_id; ?>";
                    }
                }
            }

            function validatePhone(phone) {
                var phonePattern = /^\d{10}$/;
                return phonePattern.test(phone);
            }

            function confirmPhoneUpdate() {
                var newPhoneNo = prompt("Enter the new phone no:");
                if (newPhoneNo) {

                    if (!validatePhone(newPhoneNo)) {
                        alert("Invalid phone format. Please enter a valid phone no.");
                        return;
                    }


                    var confirmed = confirm("Are you sure you want to update the phone no to '" + newPhoneNo + "'?");
                    if (confirmed) {
                        window.location.href = "updatePhoneno.php?phoneno=" + encodeURIComponent(newPhoneNo) + "&id=<?php echo $user_id; ?>";
                    }
                }
            }

            function validateEmail(email) {
                var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                return emailPattern.test(email);
            }

            function confirmEmailUpdate() {
                var newEmail = prompt("Enter the new email:");
                if (newEmail) {
                    if (!validateEmail(newEmail)) {
                        alert("Invalid email format. Please enter a valid email address.");
                        return;
                    }
                    var confirmed = confirm("Are you sure you want to update the email to '" + newEmail + "'?");
                    if (confirmed) {
                        window.location.href = "update_email.php?email=" + encodeURIComponent(newEmail) + "&id=<?php echo $user_id; ?>";
                    }
                }
            }

            function confirmPasswordUpdate() {
                var newPassword = prompt("Enter the new password:");
                var confirmPassword = prompt("Confirm the new password:");

                if (newPassword && confirmPassword) {
                    if (newPassword !== confirmPassword) {
                        alert("Passwords do not match. Please try again.");
                        return;
                    }

                    var confirmed = confirm("Are you sure you want to update the password?");
                    if (confirmed) {
                        window.location.href = "update_password.php?password=" + encodeURIComponent(newPassword) + "&id=<?php echo $user_id; ?>";
                    }
                }
            }
        </script>
    </body>
</html>
