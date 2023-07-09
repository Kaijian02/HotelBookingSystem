<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>About</title>
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
            

            @media only screen
            and (device-width: 390px)
            {
                .btn.btn-secondary.dropdown-toggle {
                    min-width: 200px !important; 
                }
                
                .row1{
                    width: 100% !important;
                }
                
                .amenities-container2{
                    height: 750px !important;
                }
                
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
                            <a class="nav-link" href="About.php" style="color: red;">About</a>
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

        <!--Section Start-->
        <section class="AMENITIES" style="background-color: #f0f8ff;">
            <div class="amenities-container" >
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="amenities-container" style="font-size: 14px;">
                            <h2 class="gtco-left">Amenities &amp; Facilities</h2>
                            <ul class="row" style="font-size:14px;">
                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/wifi.png"> 
                                    </span>

                                    <span class="_text" style="font-size: 20px;">

                                        Wifi 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img"  src="img/hairdryer.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Hair Dryer 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/depositbox.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Safety Deposit Box 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/iron.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Cloth ironing
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/waterheater.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Bath Water Heater 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/air-conditioner.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Air-cond 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/smoke-detector.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Smoke detector 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/telephone.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Telephone 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/towel.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Reserve Towel 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/smart-tv.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Smart TV 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/door.jpg"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Smart Door 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/kettle.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Kettle 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/pool.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Swimming Pool 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/gym.png"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Gym 
                                    </span>
                                </li>

                                <li class="col-md-4"> 
                                    <span class="_icon" style="font-size: 16px;">
                                        <img class="amenities-img" src="img/slipper.png" style="width:52px; height: 52px;"> 
                                    </span>
                                    <span class="_text" style="font-size: 20px;">
                                        Room Slippers 
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <!--FAQ-->

            <div class="amenities-container2" style="height:650px;">
                <h2 class="gtco-left">Frequently Asked Questions</h2>

                <div class="container" style="margin-bottom:75px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="dropdown text-center">
                                <button class="btn btn-secondary dropdown-toggle" style="font-size: 20px; width: 100%; white-space: normal; overflow-wrap: break-word; min-width: 800px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    How long does it take to get the refund after the order is cancelled?
                                </button>
                                <div class="dropdown-menu text-center row1" style="width:110%;" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item disabled" style="white-space: normal; word-break: break-word;">It usually takes 1-3 days on workdays for our staff to confirm the cancellation.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="container" style="margin-bottom:75px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="dropdown text-center">
                                <button class="btn btn-secondary dropdown-toggle" style="font-size: 20px; width: 100%; white-space: normal; overflow-wrap: break-word; min-width: 800px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    What are the check-in and check-out times?
                                </button>
                                <div class="dropdown-menu text-center row1" style="width:110%;" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item disabled" style="white-space: normal; word-break: break-word;">Check-in time is usually in the afternoon, typically between 2pm and 4pm. Check-out time is 12pm.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="container" style="margin-bottom:75px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="dropdown text-center">
                                <button class="btn btn-secondary dropdown-toggle" style="font-size: 20px; width: 100%; white-space: normal; overflow-wrap: break-word; min-width: 800px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Can I cancel my reservation?
                                </button>
                                <div class="dropdown-menu text-center row1" style="width:110%;" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item disabled" style="white-space: normal; word-break: break-word;">Free cancellation up to 24 hours before check-in. Please contact us via email or phone regarding the cancellation process.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="container" style="margin-bottom:75px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="dropdown text-center">
                                <button class="btn btn-secondary dropdown-toggle" style="font-size: 20px; width: 100%; white-space: normal; overflow-wrap: break-word; min-width: 800px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Do shuttle service available in S&AMP;C Hotel?
                                </button>
                                <div class="dropdown-menu text-center row1" style="width:110%;" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item disabled" style="white-space: normal; word-break: break-word;">Yes, shuttle service available every day from 10 a.m. to 10 p.m.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="container" style="margin-bottom:75px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="dropdown text-center">
                                <button class="btn btn-secondary dropdown-toggle" style="font-size: 20px; width: 100%; white-space: normal; overflow-wrap: break-word; min-width: 800px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Are pets allowed?
                                </button>
                                <div class="dropdown-menu text-center row1" style="width:110%;" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item disabled" style="white-space: normal; word-break: break-word;">Yes, pets allowed with additional fee.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

           

                

                





        </section>
        <!--Section End-->

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
