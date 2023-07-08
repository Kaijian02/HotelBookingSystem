<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <script src="https://kit.fontawesome.com/1527c486de.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/js.js"></script>

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand logo" href="Home.html"><img src="img/logo2.png"  alt="Company Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="Home.html" style="color: red;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Reservation.html">Room</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact.html">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="About.html">About</a>
                        </li>
                    </ul>

                    <div class="search-container" style="margin-right: 20px;">
                        <form action="">
                            <input type="text" placeholder="Search rooms" id="searchBar" name="search" style="margin-bottom:0px">
                            <button type="submit" onclick="searchBarValidation(event)"><i class="fas fa-duotone fa-magnifying-glass fa-beat"></i>
                        </form>
                    </div>

                    <div class="dropdown-acc">
                        <button class="dropbtn">My Account</button>
                        <div class="dropdown-content">
                            <a href="BookingHistory.html">Booking History</a>
                            <a href="ChangePassword.html">Change Password</a>
                            <a href="Login.html">Logout</a>
                            <a href="Login.html">Login</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </body>
</html>
