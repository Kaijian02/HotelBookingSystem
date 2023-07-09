<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/reservation.php';

$database = new Database();
$db = $database->getConnection();

$reservation = new Reservation($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if (
        
        !empty($data->name) &&
        !empty($data->ic) &&
        !empty($data->email) &&
        !empty($data->phone_no) &&
        !empty($data->check_in) &&
        !empty($data->check_out) &&
        !empty($data->room_name) &&
        !empty($data->room_num) &&
        !empty($data->pax_num) &&
        !empty($data->total) &&
        !empty($data->username) &&
        !empty($data->users_id)
) {

    // set product property values
    
    $reservation->name = $data->name;
    $reservation->ic = $data->ic;
    $reservation->email = $data->email;
    $reservation->phone_no = $data->phone_no;
    $reservation->check_in = $data->check_in;
    $reservation->check_out = $data->check_out;
    $reservation->room_name = $data->room_name;
    $reservation->room_num = $data->room_num;
    $reservation->pax_num = $data->pax_num;
    $reservation->total = $data->total;
    $reservation->username = $data->username;
    $reservation->users_id = $data->users_id;

    // create the product
    if ($reservation->create()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Reservation was created."));
    }

    // if unable to create the product, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create reservation."));
    }
}

// tell the user data is incomplete
else {

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create reservation. Data is incomplete."));
}
?>
