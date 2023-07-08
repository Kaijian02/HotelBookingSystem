<?php
session_start();
include 'config.php';

$api_url = "http://localhost/php/NetBeansProjects/Web_Development/public_html/api/room/read.php";
$username = "Jerry";
$password = "jerry123";

$options = array(
    'http' => array(
        'header' => "Authorization: Basic " . base64_encode("$username:$password")
    )
);
$context = stream_context_create($options);
$json = file_get_contents($api_url, false, $context);
$data = json_decode($json);

if (isset($_POST['book'])) {

    if (!(isset($_SESSION['name']) && $_SESSION['name'] != '')) {
        //header("location:Login.php");
        echo "<script>alert('Please login to proceed the reservation.'); window.location.href = 'Login.php';</script>";

        die();
    }
    
    $room_name = isset($_POST['name']) ? $_POST['name'] : "";
    $room_price = isset($_POST['price']) ? $_POST['price'] : "";
    $room_checkin = isset($_POST['checkin']) ? $_POST['checkin'] : "";
    $room_checkout = isset($_POST['checkout']) ? $_POST['checkout'] : "";
    $room_num = isset($_POST['room_num']) ? $_POST['room_num'] : "";
    $pax_num = isset($_POST['pax_num']) ? $_POST['pax_num'] : "";

    if (empty($room_checkin) || empty($room_checkout) || empty($room_num) || empty($pax_num)) {
        echo "<script>alert('Please select check-in, check-out, room, and pax num.')</script>";
    } else {
        $users_id = $_SESSION['users_id'];
        $delete = "DELETE FROM prebook WHERE users_id = '$users_id'";
        $deleteResult = mysqli_query($conn, $delete);
        $insert = "INSERT INTO prebook(name, price, check_in, check_out, pax_num, room_num, users_id) VALUES('$room_name', '$room_price', '$room_checkin', '$room_checkout', '$pax_num', '$room_num', '$users_id')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            header("Location: Checkout.php");
            exit();
        } else {
            //$message[] = 'could not go to checkout page';
        }
    }
};
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Reservation</title>
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
            input textarea, select {
                width: 90% !important;
                padding: 10px;
                border: 2px;
                border-radius: 5px;
                margin-bottom: 15px;
                box-sizing: border-box;
            }



            @media (max-width: 767px) {
                .responsive-div {
                    padding: 0;
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
                            <a class="nav-link" href="Reservation.php" style="color: red;">Room</a>
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
                            <input type="text" placeholder="Search rooms" id="searchBar" value="<?php
                            if (isset($_GET['search'])) {
                                echo $_GET['search'];
                            }
                            ?>" name="search" style="margin-bottom:10px" required>
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

        <?php
        $sql = "SELECT count(id) AS total FROM room";
        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($result);
        $num_rows = $values['total'];
        ?>



        <section style="background-color: #f0f8ff; padding-top: 20px; padding-bottom: 20px;">

            <div class="container text-center">
                <div class="col-lg-4 col-md-5 text-center" style="margin:auto;">
                    <h2 style="font-weight: bold;">All rooms</h2>

                </div>
                <div class="col-lg-4 col-md-4 text-center" style="margin:auto;">
                    <div class="filter__found">
                        <h6><span><?php echo $num_rows; ?></span> Rooms</h6>
                    </div>
                </div>
            </div>

            <div class="features-container">
                <div class="row" style="display: block;">

                    <?php
//                    $json = file_get_contents("http://localhost/php/NetBeansProjects/Web_Development/public_html/api/room/read.php");
//                    $data = json_decode($json);
// Fetch the names using API method
                    // Fetch the names using API method
                    $api_url = "http://localhost/php/NetBeansProjects/Web_Development/public_html/api/room/read.php";
                    $username = "Jerry";
                    $password = "jerry123";

                    $options = array(
                        'http' => array(
                            'header' => "Authorization: Basic " . base64_encode("$username:$password")
                        )
                    );
                    $context = stream_context_create($options);
                    $json = file_get_contents($api_url, false, $context);

                    $data = json_decode($json);
                    if (count($data->records)) {
                        echo "<div>";
                        //<form action='action' onsubmit='return validateForm()'>
                        foreach ($data->records as $idx => $records) {
                            echo "<form action='{$_SERVER['PHP_SELF']}' method='post' enctype='multipart/form-data'>
                                    <div class='col-md-12' style='margin-bottom: 20px;'>
        <div class='responsive-div' style='background-color: #d8dfe5; border-radius: 10px; padding: 23px; '>
            <div class='row'>
                <div class='col-md-5 col-sm-12 d-flex align-items-center justify-content-center'>
                    <img src='img/$records->image_path' width='90%' height='auto' alt='alt' style='border: 3px solid white;'>
                </div>
                <div class='col-md-4 col-sm-12' style='margin-top:20px;'>
                    <h2>RM $records->price per night</h2>
                        <input type='hidden' name='price' value='$records->price'>
                    <h4>$records->name</h4>
                    <input type='hidden' name='name' value='$records->name'>    
                    
                    <h6>$records->description</h6>  
                    
                </div>
                <div class='col-md-3 col-sm-12'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label class=''>
                                <span>Check-in</span>
                            </label>
                            <input type='date' class='check-in-date' name='checkin' min='' max='2023-12-31' style='width: 100%;' >
                        </div>
                        <div class='col-md-12'>
                            <label class=''>
                                <span>Check-out</span>
                            </label>
                            <input type='date' class='check-out-date' name='checkout' min='' style='width: 100%;' >
                        </div>
                        <div class='col-md-12'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <label class=''>
                                        <span>Room(s)</span>
                                    </label>
                                    <select name='room_num' id='room' width='90%'>
                                        <option value='0'>0</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                    </select>
                                </div>
                                <div class='col-md-6'>
                                    <label class=''>
                                        <span>Pax(s)</span>
                                    </label>
                                    <select name='pax_num' id='pax'  class='dropDown'>
                                        <option value='0'>0</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>                                       
                                    </select>
                                </div>
                            </div>
                            <p class='center-text'><button type='submit' name='book' class='book' value='book'  style='display: inline-block;'>Book</button></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    </form>";
                        }

                        echo"</div>";
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

        <!--Best-->
<!--        <script>
            function updateCheckOutMinMaxDate() {
                var checkInDate = new Date(this.value);
                var checkOutDateField = this.parentElement.nextElementSibling.querySelector('.check-out-date');

                if (checkInDate) {
                    var nextDay = new Date(checkInDate);
                    nextDay.setDate(nextDay.getDate() + 1);
                    var minDate = formatDate(nextDay);
                    checkOutDateField.setAttribute('min', minDate);
                }

                var checkOutDate = new Date(checkOutDateField.value);
                if (checkOutDate) {
                    var previousDay = new Date(checkOutDate);
                    previousDay.setDate(previousDay.getDate() - 1);
                    var maxDate = formatDate(previousDay);
                    this.setAttribute('max', maxDate);
                }
            }

            function formatDate(date) {
                var dd = date.getDate();
                var mm = date.getMonth() + 1;
                var yyyy = date.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }
                return yyyy + '-' + mm + '-' + dd;
            }

            function setTodayAsMinDate() {
                var today = new Date();
                var minDate = formatDate(today);
                var checkInFields = document.querySelectorAll('.check-in-date');
                checkInFields.forEach(function (field) {
                    field.setAttribute('min', minDate);
                });
            }

            setTodayAsMinDate();

            var checkInFields = document.querySelectorAll('.check-in-date');
            checkInFields.forEach(function (field) {
                field.addEventListener('change', updateCheckOutMinMaxDate);
            });
        </script>-->


<!--        <script>
            function updateCheckOutMinMaxDate() {
                var checkInDate = new Date(this.value);
                var checkOutDateField = this.parentElement.nextElementSibling.querySelector('.check-out-date');

                if (checkInDate) {
                    var nextDay = new Date(checkInDate);
                    nextDay.setDate(nextDay.getDate() + 1);
                    var minDate = formatDate(nextDay);
                    checkOutDateField.setAttribute('min', minDate);
                } else {
                    checkOutDateField.setAttribute('min', '');
                }

                var checkOutDate = new Date(checkOutDateField.value);
                if (checkOutDate) {
                    var previousDay = new Date(checkOutDate);
                    previousDay.setDate(previousDay.getDate() - 1);
                    var maxDate = formatDate(previousDay);
                    this.setAttribute('max', maxDate);

                    // Disable check-in dates after the selected checkout date
                    var checkInFields = document.querySelectorAll('.check-in-date');
                    checkInFields.forEach(function (field) {
                        field.setAttribute('max', maxDate);
                        if (checkInDate > previousDay) {
                            field.value = '';
                        }
                    });
                } else {
                    this.setAttribute('max', '2023-12-31');
                }
            }

            function formatDate(date) {
                var dd = date.getDate();
                var mm = date.getMonth() + 1;
                var yyyy = date.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }
                return yyyy + '-' + mm + '-' + dd;
            }

            function setTodayAsMinDate() {
                var today = new Date();
                var minDate = formatDate(today);
                var checkInFields = document.querySelectorAll('.check-in-date');
                checkInFields.forEach(function (field) {
                    field.setAttribute('min', minDate);
                });
            }

            setTodayAsMinDate();

            var checkInFields = document.querySelectorAll('.check-in-date');
            checkInFields.forEach(function (field) {
                field.addEventListener('change', updateCheckOutMinMaxDate);
            });

            var checkOutFields = document.querySelectorAll('.check-out-date');
            checkOutFields.forEach(function (field) {
                field.addEventListener('change', updateCheckOutMinMaxDate);
            });
        </script>-->
        <script>
            // Function to format the date in yyyy-mm-dd format
            function formatDate(date) {
                var dd = date.getDate();
                var mm = date.getMonth() + 1; // January is 0
                var yyyy = date.getFullYear();

                // Make the day and month format become 2 digits if they are less than 10
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }

                return yyyy + '-' + mm + '-' + dd;
            }

            // Set the minimum and maximum dates for check-in and check-out
            function setMinMaxDates() {
                var today = new Date();
                var minDate = formatDate(today);

                // Set the minimum date for check-in
                var checkInFields = document.querySelectorAll('.check-in-date');
                checkInFields.forEach(function (field) {
                    field.setAttribute('min', minDate);
                    field.setAttribute('max', '2023-12-30');
                    field.addEventListener('change', updateCheckOutMinMaxDate);
                });

                // Set the maximum date for check-out
                var checkOutFields = document.querySelectorAll('.check-out-date');
                checkOutFields.forEach(function (field) {
                    field.setAttribute('max', '2023-12-31');
                    field.disabled = true; // Disable checkout date initially
                });
            }

            // Update the minimum and maximum dates for check-out based on check-in date
            function updateCheckOutMinMaxDate() {
                var checkInDate = new Date(this.value);
                var checkOutDateField = this.parentElement.nextElementSibling.querySelector('.check-out-date');

                if (checkInDate) {
                    // Set the minimum date for check-out to be 1 day after check-in date
                    var nextDay = new Date(checkInDate);
                    nextDay.setDate(nextDay.getDate() + 1);

                    var minDate = formatDate(nextDay);
                    checkOutDateField.setAttribute('min', minDate);
                    checkOutDateField.disabled = false; // Enable checkout date field
                } else {
                    checkOutDateField.value = ''; // Reset checkout date if check-in date is cleared
                    checkOutDateField.disabled = true; // Disable checkout date field
                }
            }

            // Call the function to set the initial minimum and maximum dates
            setMinMaxDates();
        </script>
    </body>
</html>

