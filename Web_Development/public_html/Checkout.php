<?php
include 'config.php';

session_start();
error_reporting(0);
if (isset($_SESSION['users_id'])) {
    $user_id = $_SESSION['users_id'];
    $username = $_SESSION['name'];
//    echo "User id: " . $user_id;
//    echo "User name: " . $username;

    if (isset($_POST['checkout_btn'])) {
//        $user_id = $_SESSION['users_id'];
//        $username = $_SESSION['name'];
        $name = $_POST['name'];
        $icNo = $_POST['icNo'];
        $email = $_POST['email'];
        $phoneNo = $_POST['phoneNo'];
        $cardNo = $_POST['cardNo'];
        $expMonth = $_POST['expMonth'];
        $expYear = $_POST['expYear'];
        $cvv = $_POST['cvv'];

        $prebook_query = mysqli_query($conn, "SELECT * FROM `prebook` WHERE users_id = '$user_id'");

        // Fetch the data and save it to variables
        if (mysqli_num_rows($prebook_query) > 0) {
            $prebook_data = mysqli_fetch_assoc($prebook_query);
            $check_in = $prebook_data['check_in'];
            $check_out = $prebook_data['check_out'];
            $room_name = $prebook_data['name'];
            $room_num = $prebook_data['room_num'];
            $pax_num = $prebook_data['pax_num'];
            // Convert check-in and check-out dates to DateTime objects
            $check_in_date = new DateTime($check_in);
            $check_out_date = new DateTime($check_out);

            // Calculate the difference between check-in and check-out dates
            $difference = $check_in_date->diff($check_out_date);
            $difference_in_days = $difference->days;

            $total_price = ($prebook_data['price'] * $prebook_data['room_num'] * $difference_in_days);
        }


        $reservation_query = mysqli_query($conn, "INSERT INTO `reservation`(name, ic, email, phone_no, check_in, check_out, room_name, room_num, pax_num, total, username, users_id) VALUES" . "('$name','$icNo','$email','$phoneNo','$check_in','$check_out','$room_name','$room_num','$pax_num','$total_price','$username','$user_id')") or die('query failed');
        if ($prebook_query && $reservation_query) {
             echo "<script>alert('Payment successful.'); window.location.href = 'BookingHistory.php';</script>";
        }
    };
} else {
    echo "User ID is not set in the session.";
}
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>Checkout</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" type="text/css" href="css/cssCheckout.css">
        <script src="https://kit.fontawesome.com/1527c486de.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/js.js"></script>

        <style>


            .reservation-detail{
                border-radius: 10px;
                background-color: white;
            }

            .reservation-detail h3{
                text-align: center;
                color: #567b89;
                padding: 1rem;
                font-weight: 600;

                border-radius: 5px;
            }

            .reservation-detail p{
                padding: 1rem;
                font-weight: 600;
            }

            input[type="text"], input[type="email"], input[type="number"], textarea, select {
                width:90%;
                padding: 10px;
                border: 2px;
                border-radius: 5px;
                margin-bottom: 20px;
                box-sizing: border-box;

            }

            .title{
                margin-bottom: 0px;
                margin-top: 20px;
            }

        </style>
    </head>
    <body>


        <div class="title">
            <h2 class="change-font">Checkout</h2>
        </div>




        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-center" style="padding:30px; padding-top: 10px; padding-bottom: 10px;">
                            <form method="post" action="">
                                <input type="text" id="name" name="name" placeholder="Name *" required>
                                <input type="text" id="icNo" name="icNo" placeholder="IC No *" required>
                                <input type="email" id="email" name="email" placeholder="Email *" required>
                                <input type="text" id="phoneNo" name="phoneNo" placeholder="Phone No *" required>
                                <input type="text" id="cardNo" name="cardNo" placeholder="Card Number *" required>
                                <input type="text" id="expMonth" name="expMonth" placeholder="Expiration Month *" required>
                                <input type="text" id="expYear" name="expYear" placeholder="Expiration Year *" required>
                                <input type="text" id="cvv" name="cvv" placeholder="CVV *" required>
                                <input type="submit" name="checkout_btn" value="Pay Now">                            
                            </form>
                        </div>
<?php
if (isset($_SESSION['users_id'])) {
    $user_id = $_SESSION['users_id'];
}
$select_prebook = mysqli_query($conn, "SELECT * FROM `prebook` WHERE users_id='$user_id'");

$total = 0;
$grand_total = 0;
if (mysqli_num_rows($select_prebook) > 0) {
    while ($row = mysqli_fetch_assoc($select_prebook)) {
        $name = $row['name'];
        $checkin = $row['check_in'];
        $checkout = $row['check_out'];
        $roomnum = $row['room_num'];
        $paxnum = $row['pax_num'];
        $price = $row['price'];

        // Convert check-in and check-out dates to DateTime objects
        $check_in_date = new DateTime($checkin);
        $check_out_date = new DateTime($checkout);

        // Calculate the difference between check-in and check-out dates
        $difference = $check_in_date->diff($check_out_date);
        $difference_in_days = $difference->days;

        $total_price = ($row['price'] * $row['room_num'] * $difference_in_days);
        ?>
                                <div class="col-md-5 reservation-detail" style="padding:20px;">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th colspan="2"><h3>Reservation Details</h3></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Arrival:</td>
                                                <td><?php echo $checkin; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Departure:</td>
                                                <td><?php echo $checkout; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Check Out Time::</td>
                                                <td>12:00 p.m.</td>
                                            </tr>
                                            <tr>
                                                <td>Check In Time:</td>
                                                <td>2:00 p.m.</td>
                                            </tr>                                        
                                            <tr>
                                                <td>Selected room:</td>
                                                <td><?php echo $name; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total days:</td>
                                                <td><?php echo $difference_in_days; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Number of room:</td>
                                                <td><?php echo $roomnum; ?></td>
                                            </tr>

                                            <tr>
                                                <td>Number of pax:</td>
                                                <td><?php echo $paxnum; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Price per room:</td>
                                                <td>RM<?php echo $price; ?></td>
                                            </tr>

                                            <tr>
                                                <td style="color: red;">Grand Total:</td>
                                                <td style="color: red;">RM<?php echo $total_price; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
        <?php
    }
} else {
    echo "<div class='display-order'><span>your prebook is empty!</span></div>";
}
?>
                    </div>
                </div>
            </div>
        </div>




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
