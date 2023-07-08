<?php
session_start();
include 'config.php';

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Contact</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="cssContact.css">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <script src="https://kit.fontawesome.com/1527c486de.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/js.js"></script>

        
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
                            <a class="nav-link" href="Contact.php" style="color: red;">Contact</a>
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
                                    echo "<h6 style='margin-bottom:0px;'>Welcome, " . $_SESSION['name'] ."</h>";
                                    
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
            <div style="background-color: #d8dfe5; width: 100%;">
                <div class="features-container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="responsive-div" style="background-color: #d8dfe5; border-radius: 10px; padding:30px; padding-bottom: 0px; ">
                                <div class="row">
                                    <div class="col-md-6" style="padding:20px;">

                                        <div class="heading">
                                            <h2 class="gtco-left">Contact us</h2>
                                        </div>
                                        <form action="email.php" method="POST" onsubmit="return validateForm()">
                                            <input type="text" id="name" name="name" placeholder="Name *" required>
                                            <input type="email" id="email" name="email" placeholder="Email *" required>
                                            <input type="text" id="subject" name="subject" placeholder="Subject *" required>
                                            <textarea id="message" style="height: 140px;" name="message" placeholder="Body *" required></textarea>
                                            <p class="center-text"><button type="submit" name="send" class="book" style="display: inline-block; margin-top: 20px;">Send</button></p>
                                        </form>
                                    </div>
                                    <div class="col-md-6" style="padding:20px; padding-bottom: 30px;">
                                        <div style="background-color: white;padding: 30px; border-radius: 10px; border: 2px solid #4d4f5f;">
                                            <h3 style="padding-bottom:10px;">Contact Information</h3>
                                            <i class="fas fa-envelope" style="margin-bottom: 10px; margin-top: 10px;"> </i><span style="padding:10px;">SCHotel@gmail.com</span>
                                            <br>                              
                                            <i class="fa-solid fa-phone" style="margin-bottom: 10px;"></i><span style="padding:10px;">04-5235829</span>
                                            <br>
                                            <i class="fa-solid fa-location-dot" style="margin-bottom: 10px;"></i><span style="padding:10px;">23, Jln Bagan, Lorong 2, 57000 Kuala Lumpur</span>                            
                                            <br>
                                            <i class="fa-brands fa-facebook" style="margin-bottom: 10px;"></i><span style="padding: 10px;">S&AMP;C Hotel</span>
                                            <br>
                                            <i class="fa-brands fa-instagram" style="margin-bottom: 10px;"></i><span style="padding: 10px;">S&AMP;C Hotel</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>  
                </div>
            </div>

            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.4919887344295!2d100.27929577578539!3d5.341603794637019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac048a161f277%3A0x881c46d428b3162c!2sINTI%20International%20College%20Penang!5e0!3m2!1sen!2smy!4v1683214563611!5m2!1sen!2smy" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

    </body>
</html>
