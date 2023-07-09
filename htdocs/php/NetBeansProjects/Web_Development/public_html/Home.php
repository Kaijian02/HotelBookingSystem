<?php
session_start();
include 'config.php';

/*
if (isset($_SESSION['users_id'])) {
    $user_id = $_SESSION['users_id'];
    echo "User id: " . $user_id;
} else {
    echo "User ID is not set in the session.";
}*/
?>


<!DOCTYPE html>

<html>
    <head>
        <title>Home</title>
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
            .row{
                margin-left: -15px;
            }



            .carousel-inner img{
                width: 100%;

            }

            .details a:hover{
                text-decoration: none !important;
                color: white !important;
            }

            @media (min-width:992px){
                .col-sm-8-offset-2 {
                    margin-left: 16.66667%;
                }

                .col-md-2 {
                    width: 16.66667%;
                    float: left;
                }
            }
            
            h5{
                padding: 10px;
            }



            </style>
        </head>

        <body >
            <!--Header-->
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand logo" href="Home.html"><img src="img/logo2.png"  alt="Company Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="Home.php" style="color: red;">Home</a>
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
                                <input type="text" placeholder="Search rooms" id="searchBar" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" name="search" style="margin-bottom:0px;" required>
                                <button type="submit" ><i class="fas fa-duotone fa-magnifying-glass fa-beat"></i>
                            </form>
                        </div>
                        <!--onclick="searchBarValidation(event)"-->
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


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/home1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/home2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/home3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

         

            <!--About Start-->
            <div class="about">
                <div class="container">
                    <div class="row" >
                        <div class="col">
                            <img src="img/login.jpg" alt="About img" class="about-pic" style="min-width: 300px;"/>
                        </div>
                        <div class="col" style="margin-top: 30px;">
                            <div class="heading">
                                <h2 class="gtco-left">Safe & Comfort Hotel</h2>
                            </div>
                            <p style="margin-left: 40px;
                               margin-top: 0px; ">S&C Hotel is a Malaysia-based company that offers quality hotel services at an affordable price. Our company's top priorities are the safety of our customers and providing a welcoming environment. We strive to create an exceptional experience for our guests, characterized by efficiency and prompt service. At S&C Hotel, we prioritize both goodness and speed as hallmarks of our establishment.</p>
                            <br>
                            <a href="About.php" class="btn-about" style="margin-left: 40px;
                               display: inline-block">About us</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--About End-->


            <!--Why choose us? Start-->
            <div class="features" style="width: 100%;">
                <div class="features-container">
                    <div class="row">
                        <div class="col-sm-8 change-font col-sm-8-offset-2 text-center">
                            <h2>Why Book With Us</h2>
                            <p>“EVERY NIGHT , A PLEASANT NIGHT !”</p>
                        </div>
                    </div>
                    <div class="row">      
                        <div class="col-md-1 col-sm-6"></div>
                        <div class="col-md-2 col-sm-6">
                            <div class="center-text">
                                <div class="icon" style="margin: auto;"><i class="fas fa-sharp fa-regular fa-house-chimney"></i></div>
                                <div class="text">Safe and Comfort Rooms</div>
                            </div>

                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="center-text">
                                <div class="icon" style="margin: auto;"><i class="fa-solid fa-dollar-sign"></i></div>
                                <div class="text">Cheap Price</div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="center-text">
                                <div class="icon" style="margin: auto;"><i class="fa-regular fa-thumbs-up"></i></div>
                                <div class="text">Good Services</div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="center-text">
                                <div class="icon" style="margin: auto;"><i class="fas fa-wifi"></i></div>
                                <div class="text">Free Wi-Fi</div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="center-text">
                                <div class="icon" style="margin: auto;"><i class="fas fa-envelope"></i></div>
                                <div class="text">Attractive Event</div> 
                            </div>
                        </div>


                    </div>

                </div>
            </div>

            <!--Why choose us? End-->



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
