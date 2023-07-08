<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/reservation.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$reservation = new Reservation($db);

// set ID property of record to read
$reservation->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of product to be edited
$reservation->readOne();

if ($reservation->name != null) {
    // create array
    $reservation_arr = array(
        "id" => $reservation->id,
        "name" => $reservation->name,
        "ic" => $reservation->ic,
        "email" => $reservation->email,
        "phone_no" => $reservation->phone_no,
        "check_in" => $reservation->check_in,
        "check_out" => $reservation->check_out,
        "room_name_" => $reservation->room_name,
        "room_num" => $reservation->room_num,
        "pax_num" => $reservation->pax_num,
        "total" => $reservation->total,
        "username" => $reservation->username,
        "users_id" => $reservation->users_id
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($reservation_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user product does not exist
    echo json_encode(array("message" => "Reservation does not exist."));
}
?>
