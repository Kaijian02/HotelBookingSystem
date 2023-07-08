<?php
include 'config.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM reservation WHERE id = $id");
    echo "<script>alert('Reservation deleted')</script>";
    //header('location:AdminEdit.php');
};


?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>Reservation Records</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/adminstyle.css">
    </head>
    <body>
        <div class="sidenav">


            <h1 style="color: #cdcdcd;text-align: center;padding: 10px;font-size: 25px;">S &AMP; C Hotel Booking System</h1>
            <a href="AdminAction.php" style="padding-top: 100px;">Add Rooms</a>
            <a href="AdminEdit.php">Rooms</a>
            <a href="AdminBookings.php">Bookings</a>
            <a href="Login.php">Logout</a>
        </div>

        <div class="container" style="width: 70%; margin-left: 350px;">
            <h1 style="text-align: center;">Reservation Records</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>IC</th>
                        <th>Arrival</th>
                        <th>Departure</th>
                        <th>Selected Room</th>
                        <th>Number of room</th>
                        <th>No of pax</th>
                        <th>Grand Total(MYR)</th>
                        <th>Check in Time</th>
                        <th>Check out Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_reservation = mysqli_query($conn, "SELECT * FROM `reservation`");
                    $counter = 1;
                    if (mysqli_num_rows($select_reservation) > 0) {
                        while ($fetch_reservation = mysqli_fetch_assoc($select_reservation)) {
                            $checkInDate = date("Y-m-d", strtotime($fetch_reservation['check_in'])); // Extracts the date portion (YYYY-MM-DD) from the check-in datetime string
                            $checkOutDate = date("Y-m-d", strtotime($fetch_reservation['check_out'])); // Extracts the date portion (YYYY-MM-DD) from the check-out datetime string
                            ?>
                            <tr>
                                <td style="font-size:16px;">
                                    <?php echo $counter; ?>. 
                                </td>
                                <td style="font-size:16px;">
                                    <?php echo($fetch_reservation['ic']); ?>
                                </td>
                                <td class="" style="font-size:16px;">
                                    <?php echo $checkInDate; ?>
                                </td>
                                <td class="" style="font-size:16px;">
                                    <?php echo $checkOutDate; ?>
                                </td>
                                <td style="font-size:16px;">
                                    <?php echo($fetch_reservation['room_name']); ?>
                                </td>
                                <td style="font-size:16px;">
                                    <?php echo($fetch_reservation['room_num']); ?>
                                </td>
                                <td style="font-size:16px;">
                                    <?php echo($fetch_reservation['pax_num']); ?>
                                </td>
                                <td style="font-size:16px;">
                                    <?php echo($fetch_reservation['total']); ?>
                                </td>                                    
                                <td style="font-size:16px;">
                                    <p>2:00 p.m.</p>
                                </td>
                                <td style="font-size:16px;">
                                    <p>12:00 p.m.</p>
                                </td>
                                <td class="text">                                   
                                    <a href="AdminBookings.php?delete=<?php echo $fetch_reservation['id']; ?>" class="btn-delete">Delete </a>
                                </td>
                            </tr>
                            <?php
                            $counter++;
                        };
                    };
                    ?>
                </tbody>
            </table>

        </div>
    </body>
</html>
